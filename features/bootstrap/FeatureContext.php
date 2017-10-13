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
     * @Given I am on the :page page of the web application
     */
    public function iAmOnThePageOfTheWebApplication($page)
    {
       //$client = static::createClient();
       //$crawler = $client->request('GET', '/'. $page);
    }

    /**
     * @When I fill the create task form with the value :text
     */
    public function iFillTheCreateTaskFormWithTheValue($text)
    {
       //$client = static::createClient();
       //$crawler = $client->request('GET', '/'. $page);
    }

    /**
     * @When I save the new task
     */
    public function iSaveTheNewTask()
    {
        
    }

    /**
     * @Then The task :task should appear on the task list
     */
    public function theTaskShouldAppearOnTheTaskList($task)
    {
     
      $client = static::createClient();
      $crawler = $client->request('GET', '/task/create');
      
      $form = $crawler->selectButton('submit')->form();

      // set some values
    //  $form['text'] = $task;
      // submit the form
      //$crawler = $client->submit($form);
      
      /*$this->assertContains(
        'Hello World',
            $client->getResponse()->getContent()
        );
      
     /* $this->assertGreaterThan(
            0,
            $crawler->filter('html:contains("'.$task.'")')->count()
      );*/
    }
}
