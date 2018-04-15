<?php

use Behat\Mink\Exception\ResponseTextException;
use Behat\MinkExtension\Context\MinkContext;

class ApiContext extends MinkContext {

    /**
     * Given "Caroline", a "developer"
     * @Given /^"([^"]*)", a "([^"]*)"$/
     *
     * @param string $arg1
     * @param string $arg2
     */
    public function a(string $arg1, string $arg2): void {
    }

    /**
     * When she requests the "publishers" list
     * @When /^she requests the "([^"]*)" list$/
     *
     * @param string $arg1
     */
    public function sheRequestsTheList(string $arg1): void {
        $this->visit($arg1 . '.json');
    }

    /**
     * Then she should receive a list
     * @Then /^she should receive a list$/
     *
     * @throws ResponseTextException
     * @throws \InvalidArgumentException
     */
    public function sheShouldReceiveAList(): void {
        $driver = $this->getSession();
        $content = $driver->getPage()->getContent();
        $response = json_decode($content, true);
        if ($response === null) {
            throw new ResponseTextException('Invalid response', $driver);
        }
        if (!array_key_exists('data', $response)) {
            throw new ResponseTextException('No data section in response', $driver);
        }
        if (!is_array($response['data'])) {
            throw new ResponseTextException('Response is not a list', $driver);
        }
    }
}
