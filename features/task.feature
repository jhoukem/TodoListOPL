Feature: Task list
    
  In order to organize my work
  As a customer
  I need to be able to create/delete/modify a task and to display a 
  list of all tasks

  Rules:
  - No rules yet

  Scenario Outline: Create a task
    Given I create the task <task> on the web application
    Then The task <task> should appear on the task list

    Examples:
      |     task      |
      | "Hello World" |
      |     Foo       |
      |     Bar       |

Scenario Outline: Delete a task
    Given I have a task <task> on the web application
    And I delete the task <task> on the web application
    Then The task <task> should not appear on the task list

    Examples:
      |     task      |
      | "Hello World" |
      |     Foo       |
      |     Bar       |