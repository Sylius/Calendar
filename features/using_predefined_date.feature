Feature: Using a predefined date
    In order to be able to easily describe time-sensitive features
    As a Developer
    I would like to be able to use the predefined date

    Scenario: Using predefined date in time-sensitive scenario
        When it is "2020-01-20" now
        Then Calendar provide the "2020-01-20" date
