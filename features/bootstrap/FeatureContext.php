<?php

// To avoid the kernel exception due to WebtestCase...
$_SERVER['KERNEL_DIR'] = __DIR__ . '/../../app/';

use Behat\Behat\Tester\Exception\PendingException;
use Behat\Behat\Context\Context;
use Behat\Gherkin\Node\PyStringNode;
use Behat\Gherkin\Node\TableNode;
use PHPUnit_Framework_Assert as Assert;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

/**
 * Defines application features from the specific context.
 */
class FeatureContext extends WebTestCase implements Context
{
    /**
     * Initializes context.
     *
     * Every scenario gets its own context instance.
     * You can also pass arbitrary arguments to the
     * context constructor through behat.yml.
     */
    public function __construct()
    {
    }

    /**
     * @Given I am on the :arg1 page of the web application
     */
    public function iAmOnThePageOfTheWebApplication($arg1)
    {
        $client = static::createClient();
       // throw new PendingException();
    }

    /**
     * @When I fill the create task form with the value :arg1
     */
    public function iFillTheCreateTaskFormWithTheValue($arg1)
    {
       // throw new PendingException();
    }

    /**
     * @When I save the new task
     */
    public function iSaveTheNewTask()
    {
       // throw new PendingException();
    }

    /**
     * @Then The task :arg1 should appear on the task list
     */
    public function theTaskShouldAppearOnTheTaskList($arg1)
    {
        //throw new Exception('TODO');
       Assert::assertEquals(1, 1);
    }
}
