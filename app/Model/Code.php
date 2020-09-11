<?php

namespace App\Model;
use AlibabaCloud\Client\AlibabaCloud;
use AlibabaCloud\Client\Exception\ClientException;

use AlibabaCloud\Client\Exception\ServerException;
use Illuminate\Database\Eloquent\Model;

class Code extends Model
{
    public function Vcode($tel,$code){
        AlibabaCloud::accessKeyClient('LTAI4G1fkgzj4zAPX1F49HvL', '0pMVxlbYxKql4XUOQrs4w7IlsWQazx')
                        ->regionId('cn-hangzhou')
                        ->asDefaultClient();

        try {
            $result = AlibabaCloud::rpc()
                                ->product('Dysmsapi')
                                // ->scheme('https') // https | http
                                ->version('2017-05-25')
                                ->action('SendSms')
                                ->method('POST')
                                ->host('dysmsapi.aliyuncs.com')
                                ->options([
                                                'query' => [
                                                'RegionId' => "cn-hangzhou",
                                                'PhoneNumbers' => $tel,
                                                'SignName' => "夕灿奶茶",
                                                'TemplateCode' => "SMS_183261704",
                                                'TemplateParam' => "{code:$code}",
                                                ],
                                            ])
                                ->request();
                                
            return $result->toArray();
        } catch (ClientException $e) {
           return $e->getErrorMessage() . PHP_EOL;
        } catch (ServerException $e) {
            return  $e->getErrorMessage() . PHP_EOL;
        }
    }
    
}
