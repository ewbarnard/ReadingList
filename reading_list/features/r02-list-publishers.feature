Feature: List Publishers (r02)

    This is our first executable specification. It is
    intentionally trivial so that we can focus on
    getting Behat running.

    Scenario: Show Publishers List

        Given "Caroline", a "developer"
        When she requests the "publishers" list
        Then she should receive a list
