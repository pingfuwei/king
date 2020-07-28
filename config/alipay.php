<?php
   return array (
		//应用ID,您的APPID。
		'app_id' => "2016101800717616",
//		'app_id' => "2088102180173465",
		//商户私钥，您的原始格式RSA私钥
		'merchant_private_key' => "MIIEpQIBAAKCAQEA7nx6X7OuLzy8dLqsZO7ooQvXrzhnDX1sSj4eblPkVNE36tp3PPm/+e16mi/ESG6cm7MdOCY68vvfWr/2BLlY4Q3TEq5I/KKDao/H2pthCl8zwT9OWE5Iz9jo5zkXGSKbkJb8rl0Gsw7xjoHqhdu2k1QkkQBatzl50dnsTcuHXKiTwdDUPkIAQLxt8UaCr21m18MuOmo44+Utu7pzYEr+zlRgmAYUNEl90SAPvmbHuqcrUS64ZM3UwGEZ9ut/Bq8X3v3NOqTN7BsnoSU6dBrByexXWrSNAyHagfd8iWRSiZI7OPDIrOe9rSrBGnSDznscGvjydMDEOt8miVgo33JdhwIDAQABAoIBAF17K5jB3MAlZZW36oVx5HvkIXpMeJCgHkeHy/PhLHpWvD1xvxWGrEqyXMF9gcoGmZqqfgSZb7f5JNb0seGuKXmmKpuC95cXuL2XeHZnO4WORcI1J2eT4BSg6MJh7XzrxODLXmaWjl63t9XtdNldg1aCwAaahfSWMfshGfBwnDGkHPZ8RLVF7qcfnRLtQ/y5J5iuuVVTCw7O/gZw98Cz8hzZUzpLcJ5eVmvHO3Th8/3POwxXys0y+WNCgxiyPxGhJ/sGT1uAYYGqEleMhm2uhvb65jUpuVPrz3C+LJ4Qihvy/XmtW2MF+v/zYdN8b6Es5kJnTdQC50jqSB8Y8b52fLkCgYEA+dsVd9vZd4HmDd0lWnM7fSz5G+/SIS/cDK33PE3YQozXhZdlxB7f9dG+zdWVYyW6ucXxeyHuE+pt3/xd7jpKv4H6oBLSLc9pwOZ5IbPPAw5QfYREiYtYKjpD+ktvRYbr3KvkRTtDkAbxT/DdSInxWtXBsaQ+iBfyb8k7BGA3D50CgYEA9FnRx+9hv504uzx+7AtkqcLNerzfgCG2v0eDCUtkqoeMvU857fyRrH1TVWFvPEOnZ6woCBYP49oG5QCHXpgciejGC4tW4rM73B/2ISjsLko5bmP8c017ySsDyTualWa7H3k9SxDshD+6FkedHrDi2dJt5BLhc2+cxXxE4EKZonMCgYEAnfjizfF2wZSju8hCwblxt2cj6YHrvYfg/TNQyhP907Xw3kom0aUjvOxsUv/jf9hvAt4gG9YMDRN/fMq3KNQ6RnML3wGHWed12bzegWyKSkhWo8Vo//3WNHy6VhoztCXmIpObtBoQUZPSJtUHU8HDk8bqvEI4NxvM8NiuM8oRhhECgYEA8w6dU8nUa6vSkLzea6HxocO6bUqO73+Zrq9NsuMh4VcwMecq8oX3yaJoUFe5NDL/xGpE77YyXC22Cfj6rqeUS8IVrcoOxTYQZygLxnRUar8+XYZrya3bYgG9pF/7pn0nyWjqBU9yVSKm0h6uNacyIAXndaUqSY9OXEr+oCzfce0CgYEA4AaHelg3Tf4e/tbXhrfqdctc/+p+tZm7DjCnImKdFLH2psHjirVMmSsaPzF+XPzrWi5+2EKK2e/6CYnQcKy/uoy8hGaj96gFNi4jSyMI0m61IGiRawFPujn7QiVPtScOn5afFTcLr0xiWdjFLDoepqdGHDf4av44gdKdIPqjNEY=",
		
		//异步通知地址
		'notify_url' => "http://www.king.com/index/vip/notify_url",
		
		//同步跳转
		'return_url' => "http://www.king.com/index/vip/return_url",

		//编码格式
		'charset' => "UTF-8",

		//签名方式
		'sign_type'=>"RSA2",

		//支付宝网关
		'gatewayUrl' => "https://openapi.alipaydev.com/gateway.do",

		//支付宝公钥,查看地址：https://openhome.alipay.com/platform/keyManage.htm 对应APPID下的支付宝公钥。
		'alipay_public_key' => "MIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEAg6zC1O82rzplqEjLW+Di9J3ScMqhC5jkO79638Tt8qNup1ZNRMWO2vV3TkmxNlz8B/IH8DgQFH/mKGfkK2+VqmU0Gjgo7ugeHcRyQVpIgw26oX9QFkP1R6dlH9rT55jchk7GbvZFm1QlY4214O+Tjb3aWq6sUZamZ5Dks1D4tTqHRMHoi+s2p6AFUGDOUFzLxdOVnmFiHEkbbGkEjdczyqOI5/C9uvXMrDZEK6VVhv1OZwtIE7yhk5CrXeJUPvubpA62K6uNPPVu5wts6pQ+dUvg1hlo4XftmdgUr1vORc72rYXeCXlig/zu6KRT6GGEIxm7bNHOlEi4DK03BrjdcwIDAQAB",
//       'alipay_public_key' => "MIGfMA0GCSqGSIb3DQEBAQUAA4GNADCBiQKBgQCnxj/9qwVfgoUh/y2W89L6BkRAFljhNhgPdyPuBV64bfQNN1PjbCzkIM6qRdKBoLPXmKKMiFYnkd6rAoprih3/PrQEB/VsW8OoM8fxn67UDYuyBTqA23MML9q1+ilIZwBC2AQ2UBVOrFXfFl75p6/B5KsiNG9zpgmLCUYuLkxpLQIDAQAB"
       );