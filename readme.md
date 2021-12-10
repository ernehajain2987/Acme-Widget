# Coding Challenge Task :
To incentivise customers to spend more, delivery costs are reduced based on the amount
spent. Orders under $50 cost $4.95. For orders under $90, delivery costs $2.95. Orders of
$90 or more have free delivery.
They are also experimenting with special offers. The initial offer will be “buy one red widget,
get the second half price”.

Your job is to implement the basket which needs to have the following interface –
- It is initialised with the product catalogue, delivery charge rules, and offers (the
format of how these are passed it up to you)
- It has an add method that takes the product code as a parameter.
- It has a total method that returns the total cost of the basket, taking into account
the delivery and offer rules

# Solution : 

We have a created vanilla php appliaction without any framework. All the those business logic in php classes under src/ directory.

- For views and templating we have used vanilla php | HTML | Css embeded form.
- For Data we have created a dummy json called products.json under data folder and cosuming those data using a model class called products.
- Cart business and login and calculation has been done in Cart.php under classes.
- We have used PHP sessions to manage the cart calculation for every visitor.
Also we are enclosing screencast for the test cases that is asked in PDF.


