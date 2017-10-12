Feature: Task list
    
  In order to organize my work
  As a customer
  I need to be able to create/delete/modify a task and to display a 
  list of all tasks

  Rules:
  - No rules yet

  Scenario: Create a task
    Given I am on the "task_create" page of the web application
    When I fill the create task form with the value "hello world"
    And I save the new task
    Then The task "hello world" should appear on the task list
