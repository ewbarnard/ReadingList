Feature: Reading List

  The reading list contains suggestions for further learning.
  Note: Subtitle and url are shortened for brevity.

  Scenario: Show Reading List

    Given the reading list item

      | field     | value                |
      | category  | book                 |
      | title     | BDD in Action        |
      | subtitle  | Behavior-Driven...   |
      | author    | Smart, John Ferguson |
      | url       | https://...          |
      | publisher | Manning              |

    And Alan, a student
    When Alan requests the reading list
    Then he should receive a list including "title" "BDD in Action"

  Scenario: Add Reading List Item

    Given Brenda, an instructor
    And the reading list is empty
    When she adds valid reading list item

      | field     | value                |
      | category  | book                 |
      | title     | BDD in Action        |
      | subtitle  | Behavior-Driven...   |
      | author    | Smart, John Ferguson |
      | url       | https://...          |
      | publisher | Manning              |

    And she requests the reading list
    Then she should receive a list including "title" "BDD in Action"