@extends('admin.layout.master')

@section('title', 'Dashboard')

@section('content')
<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap');

    body {
        font-family: 'Poppins', sans-serif;
        background: #f8f9fc;
    }

    .dashboard-header {
        background: linear-gradient(135deg, #4e73df, #6f42c1);
        color: #fff;
        padding: 1.2rem 1.5rem;
        border-radius: 12px;
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
        font-weight: 600;
        font-size: 1.5rem;
        margin-bottom: 1.5rem;
    }

    .stats-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
        gap: 1.5rem;
        margin-bottom: 2rem;
    }

    .stat-card {
        background: #fff;
        border-radius: 12px;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
        padding: 1.5rem;
        text-align: center;
        transition: all 0.3s ease;
        position: relative;
        overflow: hidden;
    }

    .stat-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.08);
    }

    .stat-card h6 {
        color: #6c757d;
        font-weight: 500;
        margin-bottom: 0.5rem;
    }

    .stat-card h3 {
        font-weight: 700;
        color: #343a40;
        margin-bottom: 0;
    }

    .stat-icon {
        font-size: 2rem;
        margin-bottom: 0.6rem;
    }

    /* Chart Container */
    .chart-container {
        background: #fff;
        border-radius: 12px;
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.05);
        padding: 1.5rem;
        margin-bottom: 2rem;
    }

    .chart-title {
        font-weight: 600;
        font-size: 1.1rem;
        color: #333;
        margin-bottom: 1rem;
    }

    /* Animations */
    .fadeInUp {
        opacity: 0;
        transform: translateY(10px);
        animation: fadeInUp 0.8s ease-out forwards;
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

    @media (max-width: 768px) {
        .chart-container {
            padding: 1rem;
        }
    }
</style>

<div class="container mt-4">
    <div class="dashboard-header fadeInUp">📊 Admin Dashboard Overview</div>

    <!-- Stats Grid -->
    <div class="stats-grid fadeInUp">
        <div class="stat-card">
            <div class="stat-icon text-primary">👤</div>
            <h6>Total Users</h6>
            <h3>1,245</h3>
        </div>
        <div class="stat-card">
            <div class="stat-icon text-success">🛒</div>
            <h6>Total Orders</h6>
            <h3>312</h3>
        </div>
        <div class="stat-card">
            <div class="stat-icon text-info">💰</div>
            <h6>Total Revenue</h6>
            <h3>₹1,24,500</h3>
        </div>
        <div class="stat-card">
            <div class="stat-icon text-warning">📦</div>
            <h6>Products</h6>
            <h3>87</h3>
        </div>
        <div class="stat-card">
            <div class="stat-icon text-danger">🚚</div>
            <h6>Delivered</h6>
            <h3>245</h3>
        </div>
        <div class="stat-card">
            <div class="stat-icon text-secondary">⏳</div>
            <h6>Pending Orders</h6>
            <h3>67</h3>
        </div>
        <div class="stat-card">
            <div class="stat-icon text-success">⭐</div>
            <h6>Positive Reviews</h6>
            <h3>93%</h3>
        </div>
        <div class="stat-card">
            <div class="stat-icon text-primary">📈</div>
            <h6>Growth</h6>
            <h3>+18%</h3>
        </div>
    </div>

    <!-- Charts -->
    <div class="row fadeInUp">
        <div class="col-md-7 mb-4">
            <div class="chart-container">
                <div class="chart-title">📦 Monthly Orders Overview</div>
                <canvas id="barChart" height="180"></canvas>
            </div>
        </div>
        <div class="col-md-5 mb-4">
            <div class="chart-container">
                <div class="chart-title">🛍️ Order Status Distribution</div>
                <canvas id="pieChart" height="180"></canvas>
            </div>
        </div>
    </div>
</div>

<!-- Chart.js CDN -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    // Bar Chart - Monthly Orders
    const barCtx = document.getElementById('barChart');
    new Chart(barCtx, {
        type: 'bar',
        data: {
            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug'],
            datasets: [{
                label: 'Orders',
                data: [120, 150, 180, 220, 160, 210, 190, 240],
                backgroundColor: ['#4e73df'],
                borderRadius: 6
            }]
        },
        options: {
            responsive: true,
            plugins: { legend: { display: false } },
            scales: { y: { beginAtZero: true } }
        }
    });

    // Pie Chart - Order Status
    const pieCtx = document.getElementById('pieChart');
    new Chart(pieCtx, {
        type: 'pie',
        data: {
            labels: ['Completed', 'Pending', 'Cancelled'],
            datasets: [{
                data: [65, 25, 10],
                backgroundColor: ['#1cc88a', '#f6c23e', '#e74a3b'],
                hoverOffset: 10
            }]
        },
        options: {
            responsive: true,
            plugins: { legend: { position: 'bottom' } }
        }
    });
</script>
@endsection
