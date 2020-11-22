<?php
header("Acces-Control-Allow-Origin:*");
function sendToCRM($orderId){
    if (!$_POST['quantity'])
        $_POST['quantity'] = 1;
    session_start();
    $data = array(
        'order_id' => $orderId, //(авто)код заказа
        'site' => $_POST['serverName'], //(авто)сайт отправитель заказа
        'product_id' => $_POST['productId'], //код товара
        'price' => $_POST['price'], //цена товара
        'count' => $_POST['quantity'], //количество товара
        'bayer_name' => $_POST['name'], // покупатель
        'phone' => $_POST['phone'], // телефон
        'email' => $_POST['email'], //электронка
        'comment' => $_POST['comment'], // комментарий
        'total' => $_POST['price'], //сумма цены товара
        'ip' => $_SERVER['REMOTE_ADDR'], //(авто)IP-адрес клиента
        'utm_source' => $_POST['utm_source'],
        'utm_medium' => $_POST['utm_medium'],
        'utm_term' => $_POST['utm_term'],
        'utm_content' => $_POST['utm_content'],
        'utm_campaign' => $_POST['utm_campaign'],
        'subject' => $_POST['subject']
    );
    $send = urlencode(serialize($data));
    $recipient = "landingsaletoday@gmail.com"; // Ваш Электронный адрес
    $message = "ФИО: {$_POST['name']}
    Контактный телефон: {$_POST['phone']}";
    $headers = 'm5.saletoday.top' . "\r\n" .
        'Reply-To: saletoday.prom@gmail.com' . "\r\n" .
        'X-Mailer: PHP/' . phpversion();
    mail($recipient, $_POST['serverName'], $message, $headers);

echo '<img width="1" src="http://saletoday-crm.xyz/api/?data='.$send.'">';

}
$orderId = date('dmy0Gis');
$_POST['phone'] = preg_replace('/[^0-9]/', '', $_POST['phone']);
$_POST['phone'] = '0'.substr($_POST['phone'], -9, 9);

if(empty($_POST['phone'])){
    echo '<h1 style="color:red;">Пожалуйста, введите телефон</h1>';
      ?>
    <meta http-equiv="refresh" content="2; url=http://<?=$_POST['serverName']?>/utm_source=<?=$_POST['utm_source']?>&utm_medium=<?=$_POST['utm_medium']?>&utm_campaign=<?=$_POST['utm_campaign']?>$?utm_term=<?=$_POST['utm_term']?>">
       <?php
}
else{
echo "<!DOCTYPE html>
<html lang=\"ru\">
    <head>
    <style>
   body {
    background: #FAFAD2 url(images/bg.jpg); /* Цвет фона и путь к файлу */
    color:  #000000; /* Цвет текста */
   }
  </style>
    <center>
        <meta charset=\"UTF-8\">
        <title>Поздравляем! Ваш заказ принят!</title>
        <link rel=\"stylesheet\" type=\"text/css\" href=\"style.css\">
                 </head>
    <body>
        <div class=\"block_success\">
            <h2 style=\"text-transform: uppercase;\">Поздравляем! Ваш заказ принят!</h2>
            <p class=\"success\">
                В ближайшее время с вами свяжется оператор для подтверждения заказа. Пожалуйста, включите ваш контактный телефон.
            </p>
            <h3 class=\"success\">
                Пожалуйста, проверьте правильность введенной Вами информации.
            </h3>
            <div class=\"success\">
                <ul class=\"list_info\">
                   <span>Ф.И.O.:  </span><span id=\"client\">"; echo $_POST['name']; echo "</span><br>
                   <span>Телефон: </span><span id=\"tel\">"; echo $_POST['phone']; echo "</span>
                </ul>
                <br/><span id=\"submit\"></span>
            </div>
            <p class=\"fail success\">Если вы ошиблись при заполнени формы, то, пожалуйста, <a href=\"javascript: history.back(-1);\">заполните заявку еще раз</a>
             </p>
            </center>
        </div>";
    sendToCRM($orderId);
}
?>
</div>
        
            <style>
            .dop{
                margin: 70px 0 0 0;
                padding: 0 15px;
            }
            .dop-grid{
                max-width: 940px;
                margin: 0 auto;
                display: flex;
                flex-wrap: wrap;
                justify-content: space-between;
                padding: 30px 0;
            }
            .dop-item{
                width: calc(22% - 2px);
                border-radius: 10px;
                border: 1px solid rgba(0, 0, 0, 0.16);
                background: #fff;
                text-align: center;
                padding: 20px 1%;

            }
            .dop-item__main{
                text-decoration: none;
            }
            .dop-item__main p{
                color: #000;
            }
            
            .dop-item__name{
                font-size: 18px;
                margin: 0 0 15px 0;
                min-height: 40px;
                display: flex;
                align-items: center;
                justify-content: center;
            }
            .dop-item__image{
                display: block;
                max-width: 180px;
                margin: 0 auto;
                border-radius: 6px;
                box-shadow: 1px 1px 12px 1px rgba(0, 0, 0, 0.53);
                height: 250px;
                object-fit: cover;
            }
            .dop-item__main p.dop-item__url{
                text-decoration: none;
                color: #69B9FF;
                font-size: 17px;
                border: 1px solid;
                border-radius: 10px;
                padding: 7px 0;
                max-width: 120px;
                margin: 15px auto 0;
            }
            .dop-item__oldprice{
                text-decoration: line-through;
                margin: 20px 0 10px 0;
            }
            .dop-item__price{
                font-size: 19px;
                line-height: 24px;
                margin: 0;
            }
            
            .dop-item__price strong{
                display: block;
            }
            .dop__title{
                text-align: center;
                margin: 30px 0 0 0;
                font-size: 34px;
                line-height: 40px;
            }
            
            @media screen and (max-width: 1200px) {
                .dop-item {
                    width: calc(46% - 2px);
                    margin-bottom: 40px;
                }
            }
            
            @media screen and (max-width: 500px) {
                .dop-item {
                    width: calc(100% - 2px);
                }
                h2 {
                    font-size: 25px;
                    line-height: 32px;
                }
                p.success {
                    font-size: 14px;
                    line-height: 23px;
                }
                h3.success{
                    line-height: 25px;
                }
            }
            
        </style>
        
        
        
        
    <div class="dop">
        <p class="dop__title">С этим товаром также покупают :</p>
        <div class="dop-grid">
            
            
            

                <div class="dop-item">
                    <a href="javascript:if(confirm(%27http://shoe.saletoday.club/  \n\nThis file was not retrieved by Teleport Pro, because it is addressed on a domain or path outside the boundaries set for its Starting Address.  \n\nDo you want to open it from the server?%27))window.location=%27http://shoe.saletoday.club/%27" tppabs="http://shoe.saletoday.club/" class="dop-item__main" target="_blank">
                        <p class="dop-item__name">Щетка от шерсти животных на одежде</p>
                        <img class="dop-item__image" src="dop.jpg" tppabs="http://shoe.saletoday.club/dop.jpg" alt="">
                                                <p class="dop-item__oldprice">Цена: 530 грн</p>
                        <p class="dop-item__price">Цена со скидкой: <strong>199 грн</strong></p>
                        <p class="dop-item__url">Подробнее</p>
                    </a>
                </div>
            

                <div class="dop-item">
                    <a href="javascript:if(confirm(%27http://dummy.saletoday.club/  \n\nThis file was not retrieved by Teleport Pro, because it is addressed on a domain or path outside the boundaries set for its Starting Address.  \n\nDo you want to open it from the server?%27))window.location=%27http://dummy.saletoday.club/%27" tppabs="http://dummy.saletoday.club/" class="dop-item__main" target="_blank">
                        <p class="dop-item__name">Муляж камеры видеонаблюдения</p>
                        <img class="dop-item__image" src="dop-1.jpg" tppabs="http://dummy.saletoday.club/dop.jpg" alt="">
                                                <p class="dop-item__oldprice">Цена: 398 грн</p>
                        <p class="dop-item__price">Цена со скидкой: <strong>199 грн</strong></p>
                        <p class="dop-item__url">Подробнее</p>
                    </a>
                </div>
            

                <div class="dop-item">
                    <a href="javascript:if(confirm(%27http://trimmer3in1.saletoday.top/  \n\nThis file was not retrieved by Teleport Pro, because it is addressed on a domain or path outside the boundaries set for its Starting Address.  \n\nDo you want to open it from the server?%27))window.location=%27http://trimmer3in1.saletoday.top%27" tppabs="http://trimmer3in1.saletoday.top" class="dop-item__main" target="_blank">
                        <p class="dop-item__name">Триммер GOLD 3 в 1</p>
                        <img class="dop-item__image" src="dop-2.jpg" tppabs="http://trimmer3in1.saletoday.top/dop.jpg" alt="">
                                                <p class="dop-item__oldprice">Цена: 598 грн</p>
                        <p class="dop-item__price">Цена со скидкой: <strong>199 грн</strong></p>
                        <p class="dop-item__url">Подробнее</p>
                    </a>
                </div>
            

                <div class="dop-item">
                    <a href="javascript:if(confirm(%27http://bangi.saletoday.space/  \n\nThis file was not retrieved by Teleport Pro, because it is addressed on a domain or path outside the boundaries set for its Starting Address.  \n\nDo you want to open it from the server?%27))window.location=%27http://bangi.saletoday.space/%27" tppabs="http://bangi.saletoday.space/" class="dop-item__main" target="_blank">
                        <p class="dop-item__name">Тушь для ресниц</p>
                        <img class="dop-item__image" src="dop-3.jpg" tppabs="http://bangi.saletoday.space/dop.jpg" alt="">
                                                <p class="dop-item__oldprice">Цена: 398 грн</p>
                        <p class="dop-item__price">Цена со скидкой: <strong>199 грн</strong></p>
                        <p class="dop-item__url">Подробнее</p>
                    </a>
                </div>
            
        </div>
    </div>
<script>
!function(f,b,e,v,n,t,s)
{if(f.fbq)return;n=f.fbq=function(){n.callMethod?
n.callMethod.apply(n,arguments):n.queue.push(arguments)};
if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
n.queue=[];t=b.createElement(e);t.async=!0;
t.src=v;s=b.getElementsByTagName(e)[0];
s.parentNode.insertBefore(t,s)}(window,document,'script','https://connect.facebook.net/en_US/fbevents.js');
fbq('init', '355754141744523'); 
fbq('track', 'PageView');
fbq('track', 'Lead');
fbq('track', 'Purchase');
</script>
<noscript><img height="1" width="1" src="https://www.facebook.com/tr?id=355754141744523&ev=PageView&noscript=1"/></noscript><br />

 </body>
</html>
