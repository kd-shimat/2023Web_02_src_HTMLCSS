
<?php

use Facebook\WebDriver\Remote\DesiredCapabilities;
use Facebook\WebDriver\Remote\RemoteWebDriver;
use PHPUnit\Framework\TestCase;
use Facebook\WebDriver\WebDriverExpectedCondition;
use Facebook\WebDriver\WebDriverBy;

class SampleTest extends TestCase
{

    public function test()
    {
        // selenium
        $host = 'http://172.17.0.1:4444/wd/hub'; #Github Actions上で実行可能なHost
        // chrome ドライバーの起動
        $driver = RemoteWebDriver::create($host, DesiredCapabilities::chrome());
        // 指定URLへ遷移 (Google)
        $driver->get('http://php/src/helloWorld.html');
        //assert
        $tags = $driver->findElements(WebDriverBy::tagName('p'));
        $this->assertEquals("Hello,World", $tags[0]->getText());
        // ブラウザを閉じる
        $driver->close();
    }
}
