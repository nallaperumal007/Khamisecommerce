@extends('admin.layout.master')

@section('title', 'Dashboard')

@section('content')
<style>
    /* 🌈 Modern Dashboard Styling */
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap');

    body {
        font-family: 'Poppins', sans-serif;
        background-color: #f8f9fc;
    }

    .dashboard-card {
        border: none;
        border-radius: 12px;
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.05);
        overflow: hidden;
        opacity: 0;
        transform: translateY(10px);
        animation: fadeInUp 0.8s ease-out forwards;
        background: rgba(255, 255, 255, 0.9);
        backdrop-filter: blur(8px);
        transition: all 0.3s ease;
    }

    .dashboard-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 12px 30px rgba(0, 0, 0, 0.08);
    }

    .dashboard-card .card-header {
        background: linear-gradient(135deg, #4e73df, #6f42c1);
        color: #fff;
        font-weight: 600;
        font-size: 1.5rem;
        border-bottom: none;
        padding: 1rem 1.5rem;
        letter-spacing: 0.5px;
        display: flex;
        align-items: center;
        justify-content: space-between;
    }

    .dashboard-card .card-body {
        color: #2c3e50;
        padding: 2rem;
        line-height: 1.6;
        font-size: 1rem;
    }

    .welcome-icon {
        font-size: 1.8rem;
        margin-right: 10px;
        animation: wave 2s infinite ease-in-out;
    }

    @keyframes wave {
        0% { transform: rotate(0deg); }
        10% { transform: rotate(14deg); }
        20% { transform: rotate(-8deg); }
        30% { transform: rotate(14deg); }
        40% { transform: rotate(-4deg); }
        50% { transform: rotate(10deg); }
        60% { transform: rotate(0deg); }
        100% { transform: rotate(0deg); }
    }

    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(15px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    /* 🌐 Responsive */
    @media (max-width: 768px) {
        .dashboard-card .card-body {
            padding: 1.5rem;
            font-size: 0.95rem;
        }
        .dashboard-card .card-header {
            font-size: 1.25rem;
            flex-direction: column;
            text-align: center;
        }
    }
</style>

<div class="dashboard-card mt-4">
    <div class="card-header">
        <span>📊 Dashboard Overview</span>
    </div>
    <div class="card-body">
        <p>
            <span class="welcome-icon">👋</span>
            Welcome 
            @if(Auth::guard('admin')->check())
                <strong>{{ Auth::guard('admin')->user()->name }}</strong>,
            @else
                Admin,
            @endif 
            to your dashboard! 🎉  
        </p>
        <p class="mb-0">
            You are logged in successfully. Manage your products, categories, and orders with ease.
        </p>
    </div>
</div>
@endsection
