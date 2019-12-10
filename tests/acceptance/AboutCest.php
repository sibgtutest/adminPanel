<?php

use yii\helpers\Url;

class AboutCest
{
    public function ensureThatAboutWorks(AcceptanceTester $I)
    {
        $I->amOnPage(Url::toRoute('/lfsibgu/index'));
        $I->see('Основные сведения', 'h1');

         $I->amOnPage(Url::toRoute('/lfsibgu/news'));
         $I->see('Конкурс на замещение вакантных должностей!', 'a'); 

         $I->amOnPage(Url::toRoute('/lfsibgu/elements'));
        $I->see('Торжественная линейка к Дню знаний!', 'a');

        $I->amOnPage(Url::toRoute('/lfsibgu/elementarno'));
        $I->see('Продолжить обучение в магистратуре ');
        
        $I->amOnPage(Url::toRoute('/lfsibgu/element'));
         $I->see('Студенту', 'a');
        
        $I->amOnPage(Url::toRoute('/lfsibgu/elementchik'));
        $I->see(' Документы первичной профсоюзной организации', 'a');

        $I->amOnPage(Url::toRoute('/lfsibgu/elementy'));
        $I->see('Электронная информационно-образовательная среда ', 'strong');

        $I->amOnPage(Url::toRoute('/lfsibgu/elementov'));
        $I->see('Фотогалерея', 'a');

        $I->amOnPage(Url::toRoute('/lfsibgu/elemento'));
        $I->see('Ноутбуки', 'h1');
        
        $I->amOnPage(Url::toRoute('/lfsibgu/elementu'));
        $I->see('Блейд - разбор анонса Marvel. Чем удивит пятая фаза киновселенной?', 'h1');

        $I->amOnPage(Url::toRoute('/lfsibgu/elementm'));
        $I->see('faridlesosibirsk', 'h1');    
    }
}