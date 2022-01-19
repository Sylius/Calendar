Feature: Using a predefined date

    Scenario: Checking if Calendar provide date declared in setup
        Given it is "2020-01-20" now
        Then Calendar provide the "2020-01-20" date
