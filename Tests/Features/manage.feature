@mink:selenium2 @alice(Page) @alice(Jedi) @reset-schema
Feature: Manage a Render widget

    Background:
        Given I am on homepage

    Scenario: I can create a new Render widget
        When I switch to "layout" mode
        Then I should see "New content"
        When I select "Render (advanced)" from the "1" select of "main_content" slot
        Then I should see "Widget (Render (advanced))"
        And I should see "1" quantum
        When I fill in "_a_static_widget_render[route]" with "acme_app_jedi_front_index"
        And I fill in "_a_static_widget_render[params]" with "{}"
        And I submit the widget
        Then I should see the success message for Widget edit
        When I reload the page
        And I should see the following table portion:
            | Name   | Midichlorians | Side   |
            | anakin | 20000         | Dark   |
            | obiwan | 12000         | Bright |
            | yoda   | 17500         | Bright |

    Scenario: I can update a Render widget
        When I switch to "layout" mode
        Then I should see "New content"
        When I select "Render (advanced)" from the "1" select of "main_content" slot
        Then I should see "Widget (Render (advanced))"
        And I should see "1" quantum
        When I fill in "_a_static_widget_render[route]" with "acme_app_jedi_front_show"
        And I fill in "_a_static_widget_render[params]" with "{\"id\":1}"
        And I submit the widget
        Then I should see the success message for Widget edit
        When I reload the page
        Then I should see "anakin"
        And I should see "Midichlorians: 20000"
        And I should see "Side: Dark"
        When I switch to "edit" mode
        And I edit the "Render" widget
        And I should see "Widget #1 (Render (advanced))"
        And I should see "1" quantum
        When I fill in "_a_static_widget_render[route]" with "acme_app_jedi_front_index"
        And I fill in "_a_static_widget_render[params]" with "{}"
        And I submit the widget
        Then I should see the success message for Widget edit
        When I reload the page
        And I should see the following table portion:
            | Name   | Midichlorians | Side   |
            | anakin | 20000         | Dark   |
            | obiwan | 12000         | Bright |
            | yoda   | 17500         | Bright |