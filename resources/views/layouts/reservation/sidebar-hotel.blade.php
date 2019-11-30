<?php
    $title = '';
    if(str_replace('_', '-', app()->getLocale()) === 'ru') {$title = 'система онлайн-бронирования';}
    if(str_replace('_', '-', app()->getLocale()) === 'en') {$title = 'online booking system';}
    if(str_replace('_', '-', app()->getLocale()) === 'de') {$title = 'online-buchungssystem';}
    if(str_replace('_', '-', app()->getLocale()) === 'uz') {$title = 'onlayn bron qilish tizimi';}
?>
<div class="side search-wrap animate-box">
    <div id="block-search">
        <div id="tl-search-form" class="tl-container"><noindex><a href="https://www.travelline.pro/" rel="nofollow"><?php echo $title; ?></a></noindex></div>
    </div>
    <script type="text/javascript">
      (function(w){
        var q=[
          ['setContext', 'TL-INT-sayyah', "<?php echo str_replace('_', '-', app()->getLocale()) ?>"],
          ['embed', 'search-form', {container: 'tl-search-form'}]
        ];
        var t=w.travelline=(w.travelline||{}),ti=t.integration=(t.integration||{});ti.__cq=ti.__cq?ti.__cq.concat(q):q;
        if (!ti.__loader){ti.__loader=true;var d=w.document,p=d.location.protocol,s=d.createElement('script');s.type='text/javascript';s.async=true;s.src=(p=='https:'?p:'http:')+'//ibe.tlintegration.com/integration/loader.js';(d.getElementsByTagName('head')[0]||d.getElementsByTagName('body')[0]).appendChild(s);}
      })(window);
    </script>
</div>