@extends('emails.master')

@section('main_content') 
<tr>
        <td align="center" style="padding: 0px 15px;" class="padding">
            <!--[if (gte mso 9)|(IE)]>
        <table align="center" border="0" cellspacing="0" cellpadding="0" width="456">
        <![endif]-->
            <table width="100%" border="0" cellspacing="0" cellpadding="0" bgcolor="#ffffff">
                <tr>
                    <td style="color: #4f4f4f; font-size: 16px; font-family: Helvetica, Arial, sans-serif; line-height: 25px;">
                        <p style="color: #FEC36C; font-size: 24px;">Hello, {{ $data['name'] }}</p>
                    </td>
                </tr>
                <tr>
                    <td style="color: #4f4f4f; font-size: 16px; font-family: Helvetica, Arial, sans-serif; line-height: 25px;">
                        <p>You have requested a Email verification  for your account for <a href = "mailto: {{ $data['email'] }}">{{ $data['email'] }}</a>  
                           You can verified your email id by clicking the button below:
                        </p>
                    </td>
                </tr>
                <tr>
                    
                </tr>
                <tr>
                    <td style="font-size: 16px; line-height: 27px; font-family: Helvetica, Arial, sans-serif; color: #4f4f4f; ">
                    <a href="{{ $data['recoverUrl'] }}" style="border: 1px solid #e6e6e6; padding: 10px 10px; background-color: #0275d8; color: #ffffff; text-decoration: none; cursor: pointer;">Verify</a>
                    </td>
                </tr>
                <tr>
                    <td style="font-size: 16px; line-height: 27px; font-family: Helvetica, Arial, sans-serif; color: #4f4f4f;">
                        <p>Thanks!
                            <br/> <b>Ecomm Team</b>
                        </p>
                    </td>
                </tr>
                <tr>
                    <td height="40">&nbsp;</td>
                </tr>
            </table>
            <!--[if (gte mso 9)|(IE)]>
        </table>
        <![endif]-->
        </td>
    </tr>
@stop
      
