Feature: Task list
    
  In order to organize my work
  As a customer
  I need to be able to create/delete/modify a task and to display a 
  list of all tasks

  Rules:
  - No rules yet

  Scenario: Create a task
    Given I create the task "Hello World" on the web application
    Then The task "Hello World" should appear on the task list

Scenario: Delete a task
    Given I have a task "Hello World" on the web application
    And I delete the task "Hello World" on the web application
    Then The task "Hello World" should not appear on the task list
