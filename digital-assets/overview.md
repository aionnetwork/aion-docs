---
title: Digital Assets
description: An overview of what digital assets are, the possible aspects of them, and their potential use cases.
---

## What Digital Assets Are

Digital assets are often called _tokens_, _coins_, or _crypto_. We're going to try to stick to just _tokens_ in this article.

## Asset Composition

That's just a fancy way of saying, _what digital assets are made from_ or _what conceptual elements make up a digital asset_. We don't mean, the physical `bits` and `bytes` that represent a coin or token. That discussion is best left to the engineers.

There are two major decisions to make when creating a digital asset.

### Value

Do you want all the tokens to be exactly the same, and hold the exact same value? The United States Dollar is a good example of this. Every one dollar bill is worth exactly one dollar. If I have five one-dollar bills, and you have a five-dollar bill, then we have exactly the same value. This is called _fungibility_, which is a silly economic term that we don't like to use. Tokens with this attribute are all exactly the same and can be exchanged for the exact same value. If we both have one bitcoin each, then the amount of _value_ we possess is exactly equal.

The opposite of this is where two items have different values and are unique. Say we both have a bottle of wine each. Mine is some bottom shelf White Zinfandel, and yours is a fancy vintage from somewhere in France. While both are bottles of wine are in-fact _bottles of wine_ the value between them is drastically different. The value of each bottle is based upon the characteristics of the wine. This is called _non-fungibility_, but again, that's a silly term for people who studied economics so we won't be using it. Tokens can have this attribute as well.

There is a game called Crypto Kitties, where players can trade and breed digital cats. Certain attributes are more desired by the community, and players can demand a higher price for cats with desirable attributes. In this example, the cats themselves are the digital asset. Each cat is created from the same template, just with different attributes and variables.

So when creating a digital asset, you'll need to decide if you want all of them to be identical in value, or if you want them to be unique.

### Usage

What are you going to be using the token for? Is it going to be used for purely economic purposes, or will it be granting the holder some kind of right?

An example of a token that is used for economic purposes is Bitcoin. Bitcoin is mainly used to buy goods and services, with some people using it as a form of financial savings. This is the foundation of an economically based token, it is used to purchase something. It's possible to exchange Bitcoin for a pizza if you really wanted to!

The opposite of an economically based digital asset is one that is rights-based, giving the holder particular rights to either access or interact with something. Passports and driver's licenses are real-world examples of this, they give you the right to enter a country, or the right to drive a vehicle. Something to keep in mind is that not all of these assets may not be created equal. Your driver's license may allow you to drive trucks, cars, and motorbikes, whereas mine only lets me drive a car.

## Pick Two

These four options from the basis of every single digital asset:

|                  | Equal Value         | Differing Value      |
| ---              | ---                 | ---                  |
| **Financial**    | US Dollars, Bitcoin | Wine, Crypto Kitties |
| **Rights-Based** | Passport            | Drivers License      |

You must decide, based on the needs of your application, what kind of token you need.

## Extra Features

While the above four options form the basis of any digital asset, there are further design considerations you need to consider.

### Supply

How many tokens are you going to create? Is the supply going to be limited like the US dollar, or are you going to constantly produce new tokens?

### Expiry

Are the tokens going to _live_ forever, or will the be destroyed at a certain point? In many countries, gift certificates and coupons have an expiry date attached to them. Currency generally doesn't have an expiry date.

### Transferabililty

Can users transfer and trade their tokens? Or is each token assigned to only one user?

### Rights

What kind of rights are associated with this token? The right to drive a car, or enter a country, or vote?

## Create Your Digital Assets

You should now have an idea of the kind of asset you need to create. Use the form below to create a template to launch your asset with:

{{ shortcode "digital-asset-creator" }}
