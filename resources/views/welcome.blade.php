<head>

<style>
    .hero {
    background-image: url('path/to/your/image.jpg');
    background-size: cover;
    background-position: center;
    height: 400px;
    display: flex;
    align-items: center;
    justify-content: center;
    color: #fff;
    text-align: center;
}

.hero-content {
    max-width: 600px;
    margin: 0 auto;
}

.hero h1 {
    font-size: 40px;
    margin-bottom: 20px;
    color: black;
}

.hero p {
    font-size: 18px;
    margin-bottom: 40px;
    color: black;
}

.btn {
    display: inline-block;
    padding: 10px 20px;
    font-size: 18px;
    background-color: #007bff;
    color: #fff;
    text-decoration: none;
    border-radius: 5px;
}

.btn:hover {
    background-color: #0056b3;
}

.container {
    margin-top: 50px;
}

.features {
    display: flex;
    justify-content: center;
    gap: 30px;
    margin-top: 30px;
}

.feature {
    text-align: center;
}

.feature i {
    font-size: 40px;
    margin-bottom: 20px;
    color: #007bff;
}

.feature h3 {
    font-size: 24px;
    margin-bottom: 10px;
}

.feature p {
    font-size: 16px;
}

</style>
</head>
@extends('layouts.app')

@section('content')
<div class="hero">
    <div class="hero-content">
        <h1>Welcome to Our Website</h1>
        <p>Discover the best services and products just for you</p>
        <a href="" class="btn btn-primary">Get Started</a>
    </div>
</div>

<div class="container">
    <section class="features">
        <div class="feature">
            <i class="fa fa-rocket"></i>
            <h3>Fast and Reliable</h3>
            <p>Our platform ensures fast and reliable service delivery.</p>
        </div>
        <div class="feature">
            <i class="fa fa-shield"></i>
            <h3>Secure and Protected</h3>
            <p>Your data and privacy are highly protected on our platform.</p>
        </div>
        <div class="feature">
            <i class="fa fa-cogs"></i>
            <h3>Easy to Use</h3>
            <p>Our user-friendly interface makes it simple to navigate and use.</p>
        </div>
    </section>
</div>
@endsection
