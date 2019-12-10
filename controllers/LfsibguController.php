<?php

namespace app\controllers;


use yii\web\Controller;


class LfsibguController extends Controller
{
    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        return $this->redirect('http://www.lfsibgu.ru/sveden/common/');
    }
    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionNews()
    {
        return $this->redirect('http://lfsibgu.ru/?start=0');
    }
    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionElements()
    {
        return $this->redirect('http://lfsibgu.ru/?start=1');
    }
    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionElementarno()
    {
        return $this->redirect('http://lfsibgu.ru/?start=2');
    }
    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionElement()
    {
        return $this->redirect('http://lfsibgu.ru/?start=2');
    }
    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionElementchik()
    {
        return $this->redirect('http://lfsibgu.ru/profsoyuznyj-komitet/dokumenty-ppo');
    }
    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionElementy()
    {
        return $this->redirect('http://lfsibgu.ru/studentu/elektronnaya-informatsionno-obrazovatelnaya-sreda');
    }
    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionElementov()
    {
        return $this->redirect('http://lfsibgu.ru/profsoyuznyj-komitet/fotogalereya');
    }
    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionElemento()
    {
        return $this->redirect('https://www.dns-shop.ru/catalog/17a892f816404e77/noutbuki/');
    }
/**
     * Displays homepage.
     *
     * @return string
     */
    public function actionElementu()
    {
        return $this->redirect('https://www.youtube.com/watch?v=Luva_Ziok8I');
    }
    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionElementm()
    {
        return $this->redirect('https://github.com/faridlesosibirsk');
    }
}