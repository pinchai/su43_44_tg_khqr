# Telegram Link Preview Configuration for E-Commerce Pages

When you paste a link into Telegram and see a preview (title, description, image), Telegram is reading **Open Graph (OG) metadata** from your webpage.

This document explains how to configure an ecommerce page correctly so Telegram displays rich previews.

---

## 1. Open Graph Meta Tags (Required)

Add the following tags inside the `<head>` section of your HTML.

```html
<head>
  <meta charset="UTF-8">

  <!-- Basic SEO -->
  <title>My Store – Buy Games & Digital Goods</title>
  <meta name="description" content="Buy games, gift cards, and digital items at the best price.">

  <!-- Open Graph (Telegram, Facebook, Discord) -->
  <meta property="og:type" content="website">
  <meta property="og:title" content="My Store – Digital Products">
  <meta property="og:description" content="Safe and fast digital product marketplace.">
  <meta property="og:url" content="https://mystore.com/product/123">
  <meta property="og:image" content="https://mystore.com/static/images/product-123.jpg">

  <!-- Image dimensions -->
  <meta property="og:image:width" content="1200">
  <meta property="og:image:height" content="630">

  <!-- Optional -->
  <meta name="twitter:card" content="summary_large_image">
</head>
