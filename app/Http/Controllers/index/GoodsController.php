<?php

namespace App\Http\Controllers\index;

use App\AdminModel\Goods;
use App\AdminModel\Goods_attrModel;
use App\AdminModel\goods_stock;
use App\AdminModel\GoodsvalueModel;
use App\AdminModel\HistoryModel;
use App\Http\Controllers\Controller;
use App\indexModel\User;
use Illuminate\Http\Request;
use App\indexModel\store;

class GoodsController extends Controller
{
    /*
     * 商品详情
     */
    public function desc(Request $request){
        $goods_id=$request->get('goods_id');
        //        游览历史记录、
        $user_name = $request->session()->get("user_name");
        $this->history($goods_id,$user_name);
        if(empty($goods_id)){
            $message = [
                'code' => '000001',
                'message' => 'error',
                'result' => [
                    'message' =>"缺少必要参数",
                ]
            ];
            return json_encode($message,JSON_UNESCAPED_UNICODE);
        }
        $goods_model=new Goods();
        $goods_info=$goods_model::where('goods_id',$goods_id)->first();
        if(empty($goods_info)){
            $message = [
                'code' => '000001',
                'message' => 'error',
                'result' => [
                    'message' =>"参数有问题,请核对后再试",
                ]
            ];
            return json_encode($message,JSON_UNESCAPED_UNICODE);
        }else{
            $stock_model=new goods_stock();
            $where=[
                ['goods_id','=',$goods_info['goods_id']],
                ['is_del','=',1]
            ];
            $arr=[];
            $arr1=[];
            $goods_stock=$stock_model::where($where)->get()->toArray();
            $stock="";
            foreach($goods_stock as $k=>$v){
//                $stock=$v['stock'];
                if($stock!==""){
                    $stock=$stock+$v['stock'];
                }else{
                    $stock = $v['stock'];
                }
            }
            foreach($goods_stock as $k=>$v){
                $ass=explode(':', $v['ability']);
//                print_r($ass);
                foreach($ass as $kk=>$vv){
                    $asd=explode(',', $vv);
                    //根据下标查询属性和值 0 ：属性表  1 属性值
                    foreach($asd as $kkk=>$vvv){
////                        echo $kkk;
                        if($kkk==0){
                            $arr[]=$vvv;
                        }else{
                            $arr1[]=$vvv;
                        }
//                        if($kkk==0){
//                            $goods_attrmodel=new Goods_attrModel();
//                            $goods_attr=$goods_attrmodel::where('attr_id',$vvv)->first();
//                            $vvv=$goods_attr['attr_name'];
//                            echo $vvv;
//                        }else{
//                            $goods_valmodel=new GoodsvalueModel();
//                            $goods_val=$goods_valmodel::where('goods_val_id',$vvv)->first();
//                            $vvv=$goods_val['goods_val_name'];
//                            echo $vvv;
//                        }
                    }
                }
            }
//            print_r($goods_stock);
            //该商品的属性
            $arr=array_unique($arr);
            $goods_attr=[];
            $goods_val=[];
            foreach($arr as  $k=>$v){
                $goods_attrmodel=new Goods_attrModel();
                $goods_attr_info=$goods_attrmodel::where('attr_id',$v)->first();
                $goods_attr[]=$goods_attr_info;
            }
//            print_r($goods_attr);
            $arr1=array_unique($arr1);
            foreach($arr1 as $k=>$v){
                $goods_valmodel=new GoodsvalueModel();
                $goods_val_info=$goods_valmodel::where('goods_val_id',$v)->first();
                $goods_val[]=$goods_val_info;
            }
//            print_r($goods_val);
//            print_r($goods_attr);die;
//            foreach($goods_attr as $k=>$v){
//                foreach($goods_val as $kk=>$vv){
//                    if($v['attr_id']==$vv['attr_id']){
//                        $goods_attr['goods_value_name']=$vv['goods_value_name'];
//                    }
//                }
//            }
//            print_r($goods_attr);
//            print_r($goods_val);
//            die;
//            --------------------------------------------------------------xu 判断商品是否修改
              $user_name =request()->session()->get('user_name');
              if(empty($user_name)){
                $status = 3;
                return view('index.goods.desc',['goods'=>$goods_info,'goods_attr'=>$goods_attr,'goods_val'=>$goods_val,'stock'=>$stock,'status'=>$status]);
              }
              $user_id = user::where('user_name',$user_name)->get();
              $user_id = $user_id[0]->user_id;
              $data = store::where(['goods_id'=>$goods_id,'user_id'=>$user_id])->first();
              if($data){
                $status=$data->status;
              }else{
                $status=1;
              }
            return view('index.goods.desc',['goods'=>$goods_info,'goods_attr'=>$goods_attr,'goods_val'=>$goods_val,'stock'=>$stock,'status'=>$status]);
        }
    }
    /*
     * 游览历史记录判断是否有用户登陆
     */
    public function history($goods_id,$user_name){
        if($user_name){

            $res=$this->saveHistoryDb($goods_id,$user_name);
//        }else{
////            $this->saveHistorycookie($goods_id);
//
//            $this->saveHistoryDb($goods_id,$user_name);
////            dd($res);
//
//        }
//        else{
//            $this->saveHistorycookie($goods_id);
        }
    }
    /*
     * 存储浏览历史记录---数据库
     */
    public function saveHistoryDb($goods_id,$user_name){
        $usermodel=new User();
        $user=$usermodel::where('user_name',$user_name)->first();
        //把商品id 用户id 浏览时间入库
//        $goodsmodel=new Goods();
        $historymodel=new HistoryModel();
        $where=[
            ['goods_id','=',$goods_id],
            ['is_del','=',1]
        ];
        $goods_info=$historymodel::where($where)->first();
        if(empty($goods_info)){
            $arr=['goods_id'=>$goods_id,'time'=>time(),'user_id'=>$user['user_id']];
            $res=$historymodel::insert($arr);
            return $res;
        }else{
            $data=[];
            $data['time']=time();
            $data['count']=$goods_info['count']+1;
            $res=$historymodel::where($where)->update($data);
            return $res;
        }

    }
    /*x
     * 存储浏览历史记录---cookie
     */
//    public function saveHistorycookie($goods_id){
//        $historyinfo=cookie('historyinfo');
//        //把商品id 用户id 浏览时间存入cookie
//        $historyinfo[]=['goods_id'=>$goods_id,'time'=>time()];
//        // dump($arr);
//        cookie('historyinfo',$historyinfo);
//    }
    public function gethistory(){
        $user_name=session('user_name');
        $user=User::where('user_name',$user_name)->first();
        $user_id=$user['user_id'];
//        echo $user_id;die;
        $wheres=[
            'user_id'=>$user_id,
            'history.is_del'=>1
        ];
        if($user_id){
            //猜你喜欢列表展示
            $likeinfo=[
                ['user_id',$user_id],
                ['history.is_del',1]
            ];
            $likeinfos = HistoryModel::leftjoin('shop_goods', 'shop_goods.goods_id', '=', 'history.goods_id')->leftjoin('category','category.cate_id','=','shop_goods.goods_id')->where($likeinfo)->orderBy('count', 'desc')->first();
//           dd($like);
            $goodsinfo=Goods::where('goods_id',$likeinfos['goods_id'])->first();
            $like=Goods::where('cate_id',$goodsinfo['cate_id'])->limit(4)->get();
            //条数
            $num=Goods::where('cate_id',$goodsinfo['cate_id'])->count();
        }else {
            //猜你喜欢列表展示

            $likeinfo = HistoryModel::leftjoin('shop_goods', 'shop_goods.goods_id', '=', 'history.goods_id')->leftjoin('category','category.cate_id','=','shop_goods.goods_id')->where('history.is_del', 1)->orderBy('count', 'desc')->first();
//           dd($like);
            $goodsinfo=Goods::where('goods_id',$likeinfo['goods_id'])->first();
            $like=Goods::where('cate_id',$goodsinfo['cate_id'])->limit(4)->get();
            $num=Goods::where('cate_id',$goodsinfo['cate_id'])->count();
        }
        $data=Goods::leftjoin('history','history.goods_id','=','shop_goods.goods_id')->where($wheres)->limit(8)->get();

        return view('index.goods.gethistory',['data'=>$data,'like'=>$like,'num'=>$num]);
    }






















































    /*
     * 获取该商品的该属性单价与库存
     */
    public function price(Request $request){
//        接受全部数据
        $data=$request->all();
        // dd($data);
        $add = implode(":",$data["attr_id"]);
        // print_r($add);exit;
//        通过商品id查询该商品的全部属性
        $where=[
            ['goods_id','=',$data['goods_id']],
            ["is_del","=",1]
        ];
        $goods_stock_model=new goods_stock();
//        这个商品的所有属性
        $goods_stock=$goods_stock_model::where($where)->get();
        // dd($goods_stock);
        foreach($goods_stock as $k=>$v){
            $ability = $v["ability"];
            if($add==$ability){
                // print_r($ability);
                $info = $goods_stock_model::where("ability",$ability)->first();
                // print_r($info);
                return $info;
            }
        }
    }

    //sku属性值查询
    public function select(Request $request){
        $goods_val_id = $request->get("goods_val_id");
        $goods_id = $request->get("goods_id");
        $attr_id = $request->get("attr_id");
        // dd($goods_id);
    }
}
