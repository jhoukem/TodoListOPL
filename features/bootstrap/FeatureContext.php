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
     * @Given I create the task :task on the web application
     */
    public function iCreateTheTaskOnTheWebApplication($task)
    {
      $client = static::createClient();
      $crawler = $client->request('GET', '/task/create');
      
      $form = $crawler->selectButton('Create')->form();

      // Set the task values
      $form->setValues(array('taskbundle_task[text]' => $task));
      // submit the form
      $client->submit($form);
      
    }

    /**
     * @Then The task :task should appear on the task list
     */
    public function theTaskShouldAppearOnTheTaskList($task)
    {
      $client = static::createClient();
      $client->request('GET', '/tasks');
      
      $this->assertContains(
        $task,
            $client->getResponse()->getContent()
      );
      
    }

    /**
     * @Given I have a task :task on the web application
     */
    public function iHaveATaskOnTheWebApplication($task)
    {
      $client = static::createClient();
      $client->request('GET', '/tasks');
      
      $this->assertContains(
        $task,
            $client->getResponse()->getContent()
      );
    }
    
    /**
     * @Given I delete the task :task on the web application
     */
    public function iDeleteTheTaskOnTheWebApplication($task)
    {
      $client = static::createClient();
      $crawler = $client->request('GET', '/tasks');
      
      // Select the delete link
      $link = $crawler->filter('[id="'.$task.'"] > .btn-danger')->eq(0)->link();
      // Click on the delete link
      $client->click($link);
    }

    /**
     * @Then The task :task should not appear on the task list
     */
    public function theTaskShouldNotAppearOnTheTaskList($task)
    {
      $client = static::createClient();
      $client->request('GET', '/tasks');
      
      $this->assertNotContains(
        $task,
            $client->getResponse()->getContent()
        );
    }
    
}
