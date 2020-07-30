<?php

namespace yii\jui\autosearch\tests;

use yii\jui\autosearch\AutoComplete;
use yii\phpunit\TestCase;

class AutoCompleteTest extends TestCase
{

    public function testWidgetClass()
    {
        $widget = AutoComplete::begin();
        $this->assertArrayHasKey('class', $widget->options);
        $this->assertEquals('form-control', $widget->options['class']);
        array_pop(AutoComplete::$stack);
    }

    public function testWidgetClass2()
    {
        $widget = AutoComplete::begin([
            'options' => ['class' => 'something']
        ]);
        $this->assertArrayHasKey('class', $widget->options);
        $this->assertEquals('something form-control', $widget->options['class']);
        array_pop(AutoComplete::$stack);
    }

    public function testWidgetOnfocus()
    {
        $widget = AutoComplete::begin();
        $this->assertArrayHasKey('onfocus', $widget->options);
        $this->assertEquals('jQuery(this).autocomplete(\'search\');', $widget->options['onfocus']);
        array_pop(AutoComplete::$stack);
    }

    public function testWidgetOnfocus2()
    {
        $widget = AutoComplete::begin([
            'options' => ['onfocus' => '']
        ]);
        $this->assertArrayHasKey('onfocus', $widget->options);
        $this->assertEquals('', $widget->options['onfocus']);
        array_pop(AutoComplete::$stack);
    }

    public function testWidgetSource()
    {
        $widget = AutoComplete::begin();
        $this->assertEquals([], $widget->source);
        $this->assertArrayHasKey('source', $widget->clientOptions);
        $this->assertEquals([], $widget->clientOptions['source']);
        array_pop(AutoComplete::$stack);
    }

    public function testWidgetSource2()
    {
        $widget = AutoComplete::begin([
            'source' => 'http://example.com',
            'clientOptions' => ['source' => []]
        ]);
        $this->assertEquals('http://example.com', $widget->source);
        $this->assertArrayHasKey('source', $widget->clientOptions);
        $this->assertEquals('http://example.com', $widget->clientOptions['source']);
        array_pop(AutoComplete::$stack);
    }

    public function testWidgetMinLength()
    {
        $widget = AutoComplete::begin();
        $this->assertEquals(0, $widget->minLength);
        $this->assertArrayHasKey('minLength', $widget->clientOptions);
        $this->assertEquals(0, $widget->clientOptions['minLength']);
        array_pop(AutoComplete::$stack);
    }

    public function testWidgetMinLength2()
    {
        $widget = AutoComplete::begin([
            'minLength' => 2,
            'clientOptions' => ['minLength' => 0]
        ]);
        $this->assertEquals(2, $widget->minLength);
        $this->assertArrayHasKey('minLength', $widget->clientOptions);
        $this->assertEquals(2, $widget->clientOptions['minLength']);
        array_pop(AutoComplete::$stack);
    }

    public function testWidgetClientOptions()
    {
        $widget = AutoComplete::begin();
        $this->assertArrayNotHasKey('autoFocus', $widget->clientOptions);
        $this->assertArrayNotHasKey('delay', $widget->clientOptions);
        array_pop(AutoComplete::$stack);
    }

    public function testWidgetClientOptions2()
    {
        $widget = AutoComplete::begin([
            'clientOptions' => [
                'autoFocus' => false,
                'delay' => 1000
            ]
        ]);
        $this->assertArrayHasKey('autoFocus', $widget->clientOptions);
        $this->assertEquals(false, $widget->clientOptions['autoFocus']);
        $this->assertArrayHasKey('delay', $widget->clientOptions);
        $this->assertEquals(1000, $widget->clientOptions['delay']);
        array_pop(AutoComplete::$stack);
    }
}
