@extends('layouts.app')
@section('content')

    <!-- Sidebar -->
    <div class="sidebar" id="sidebar">
        <div class="sidebar-brand">
            <i class="fas fa-store me-2"></i> E-Commerce Admin
        </div>
        <ul class="nav flex-column mt-3">
            <li class="nav-item">
                <a class="nav-link active" href="#dashboard" data-section="dashboard">
                    <i class="fas fa-tachometer-alt me-2"></i> Dashboard
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#users" data-section="users">
                    <i class="fas fa-users me-2"></i> User Management
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#products" data-section="products">
                    <i class="fas fa-box me-2"></i> Product Management
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#orders" data-section="orders">
                    <i class="fas fa-shopping-cart me-2"></i> Order Management
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#payments" data-section="payments">
                    <i class="fas fa-credit-card me-2"></i> Payment
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#reports" data-section="reports">
                    <i class="fas fa-chart-line me-2"></i> Laporan Penjualan
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#categories" data-section="categories">
                    <i class="fas fa-tags me-2"></i> Kategori Produk
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#settings" data-section="settings">
                    <i class="fas fa-cog me-2"></i> Settings
                </a>
            </li>
        </ul>
    </div>

    <!-- Top Navbar -->
    
    <!-- Main Content -->
    <div class="main-content">
        
        <!-- Dashboard Section -->
        <div id="dashboard" class="content-section">
            <h2 class="mb-4">Dashboard Overview</h2>
            
            <!-- Statistics Cards -->
            <div class="row g-3 mb-4">
                <div class="col-md-3">
                    <div class="card stat-card shadow-sm">
                        <div class="card-body d-flex align-items-center">
                            <div class="stat-icon bg-primary bg-opacity-10 text-primary me-3">
                                <i class="fas fa-users"></i>
                            </div>
                            <div>
                                <h6 class="text-muted mb-1">Total Users</h6>
                                <h3 class="mb-0">1,234</h3>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card stat-card shadow-sm">
                        <div class="card-body d-flex align-items-center">
                            <div class="stat-icon bg-success bg-opacity-10 text-success me-3">
                                <i class="fas fa-box"></i>
                            </div>
                            <div>
                                <h6 class="text-muted mb-1">Total Products</h6>
                                <h3 class="mb-0">567</h3>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card stat-card shadow-sm">
                        <div class="card-body d-flex align-items-center">
                            <div class="stat-icon bg-warning bg-opacity-10 text-warning me-3">
                                <i class="fas fa-shopping-cart"></i>
                            </div>
                            <div>
                                <h6 class="text-muted mb-1">Total Orders</h6>
                                <h3 class="mb-0">890</h3>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card stat-card shadow-sm">
                        <div class="card-body d-flex align-items-center">
                            <div class="stat-icon bg-info bg-opacity-10 text-info me-3">
                                <i class="fas fa-dollar-sign"></i>
                            </div>
                            <div>
                                <h6 class="text-muted mb-1">Total Revenue</h6>
                                <h3 class="mb-0">Rp 45.2M</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Recent Orders -->
            <div class="row">
                <div class="col-md-8">
                    <div class="card shadow-sm">
                        <div class="card-header bg-white">
                            <h5 class="mb-0">Recent Orders</h5>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>Order ID</th>
                                            <th>Customer</th>
                                            <th>Total</th>
                                            <th>Status</th>
                                            <th>Date</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>#ORD-001</td>
                                            <td>John Doe</td>
                                            <td>Rp 250,000</td>
                                            <td><span class="badge bg-success">Completed</span></td>
                                            <td>18 Dec 2024</td>
                                        </tr>
                                        <tr>
                                            <td>#ORD-002</td>
                                            <td>Jane Smith</td>
                                            <td>Rp 450,000</td>
                                            <td><span class="badge bg-warning">Processing</span></td>
                                            <td>18 Dec 2024</td>
                                        </tr>
                                        <tr>
                                            <td>#ORD-003</td>
                                            <td>Bob Johnson</td>
                                            <td>Rp 180,000</td>
                                            <td><span class="badge bg-info">Shipped</span></td>
                                            <td>17 Dec 2024</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card shadow-sm">
                        <div class="card-header bg-white">
                            <h5 class="mb-0">Top Products</h5>
                        </div>
                        <div class="card-body">
                            <div class="d-flex align-items-center mb-3">
                                <img src="https://via.placeholder.com/50" class="rounded me-3" alt="Product">
                                <div class="flex-grow-1">
                                    <h6 class="mb-0">Product Name 1</h6>
                                    <small class="text-muted">234 sold</small>
                                </div>
                            </div>
                            <div class="d-flex align-items-center mb-3">
                                <img src="https://via.placeholder.com/50" class="rounded me-3" alt="Product">
                                <div class="flex-grow-1">
                                    <h6 class="mb-0">Product Name 2</h6>
                                    <small class="text-muted">198 sold</small>
                                </div>
                            </div>
                            <div class="d-flex align-items-center">
                                <img src="https://via.placeholder.com/50" class="rounded me-3" alt="Product">
                                <div class="flex-grow-1">
                                    <h6 class="mb-0">Product Name 3</h6>
                                    <small class="text-muted">176 sold</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- User Management Section -->
        <div id="users" class="content-section" style="display: none;">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h2>User Management</h2>
                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addUserModal">
                    <i class="fas fa-plus me-2"></i> Add New User
                </button>
            </div>

            <div class="card shadow-sm">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Login Method</th>
                                    <th>Status</th>
                                    <th>Joined</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>John Doe</td>
                                    <td>john@example.com</td>
                                    <td><span class="badge bg-primary">Email</span></td>
                                    <td><span class="badge bg-success">Active</span></td>
                                    <td>15 Dec 2024</td>
                                    <td class="table-actions">
                                        <button class="btn btn-sm btn-info"><i class="fas fa-eye"></i></button>
                                        <button class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></button>
                                        <button class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>Jane Smith</td>
                                    <td>jane@example.com</td>
                                    <td><span class="badge bg-danger">Google</span></td>
                                    <td><span class="badge bg-success">Active</span></td>
                                    <td>14 Dec 2024</td>
                                    <td class="table-actions">
                                        <button class="btn btn-sm btn-info"><i class="fas fa-eye"></i></button>
                                        <button class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></button>
                                        <button class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- Product Management Section -->
        <div id="products" class="content-section" style="display: none;">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h2>Product Management</h2>
                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addProductModal">
                    <i class="fas fa-plus me-2"></i> Add New Product
                </button>
            </div>

            <div class="card shadow-sm">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Image</th>
                                    <th>Name</th>
                                    <th>Category</th>
                                    <th>Price</th>
                                    <th>Stock</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><img src="https://via.placeholder.com/50" class="rounded" alt="Product"></td>
                                    <td>Product Name 1</td>
                                    <td>Electronics</td>
                                    <td>Rp 500,000</td>
                                    <td><span class="badge bg-success">In Stock (50)</span></td>
                                    <td><span class="badge bg-success">Active</span></td>
                                    <td class="table-actions">
                                        <button class="btn btn-sm btn-info"><i class="fas fa-eye"></i></button>
                                        <button class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></button>
                                        <button class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
                                    </td>
                                </tr>
                                <tr>
                                    <td><img src="https://via.placeholder.com/50" class="rounded" alt="Product"></td>
                                    <td>Product Name 2</td>
                                    <td>Fashion</td>
                                    <td>Rp 250,000</td>
                                    <td><span class="badge bg-warning">Low Stock (5)</span></td>
                                    <td><span class="badge bg-success">Active</span></td>
                                    <td class="table-actions">
                                        <button class="btn btn-sm btn-info"><i class="fas fa-eye"></i></button>
                                        <button class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></button>
                                        <button class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- Order Management Section -->
        <div id="orders" class="content-section" style="display: none;">
            <h2 class="mb-4">Order Management</h2>

            <div class="card shadow-sm">
                <div class="card-body">
                    <ul class="nav nav-tabs mb-3" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-bs-toggle="tab" href="#all-orders">All Orders</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" href="#pending-orders">Pending</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" href="#processing-orders">Processing</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" href="#shipped-orders">Shipped</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" href="#completed-orders">Completed</a>
                        </li>
                    </ul>

                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="all-orders">
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>Order ID</th>
                                            <th>Customer</th>
                                            <th>Products</th>
                                            <th>Total</th>
                                            <th>Status</th>
                                            <th>Date</th>
                                            <th>Tracking</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>#ORD-001</td>
                                            <td>John Doe</td>
                                            <td>3 items</td>
                                            <td>Rp 750,000</td>
                                            <td><span class="badge bg-warning">Processing</span></td>
                                            <td>18 Dec 2024</td>
                                            <td><a href="#">Track</a></td>
                                            <td class="table-actions">
                                                <button class="btn btn-sm btn-info"><i class="fas fa-eye"></i></button>
                                                <button class="btn btn-sm btn-success"><i class="fas fa-check"></i></button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>#ORD-002</td>
                                            <td>Jane Smith</td>
                                            <td>2 items</td>
                                            <td>Rp 450,000</td>
                                            <td><span class="badge bg-info">Shipped</span></td>
                                            <td>17 Dec 2024</td>
                                            <td><a href="#">JNE123456</a></td>
                                            <td class="table-actions">
                                                <button class="btn btn-sm btn-info"><i class="fas fa-eye"></i></button>
                                                <button class="btn btn-sm btn-success"><i class="fas fa-check"></i></button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Payment Section -->
        <div id="payments" class="content-section" style="display: none;">
            <h2 class="mb-4">Payment Management</h2>

            <div class="row mb-4">
                <div class="col-md-4">
                    <div class="card shadow-sm">
                        <div class="card-body">
                            <h6 class="text-muted">Total Payments</h6>
                            <h3>Rp 45,250,000</h3>
                            <small class="text-success"><i class="fas fa-arrow-up"></i> 12% from last month</small>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card shadow-sm">
                        <div class="card-body">
                            <h6 class="text-muted">Pending Payments</h6>
                            <h3>Rp 2,150,000</h3>
                            <small class="text-warning">15 transactions</small>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card shadow-sm">
                        <div class="card-body">
                            <h6 class="text-muted">Failed Payments</h6>
                            <h3>Rp 450,000</h3>
                            <small class="text-danger">3 transactions</small>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card shadow-sm">
                <div class="card-header bg-white">
                    <h5 class="mb-0">Payment Transactions</h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Transaction ID</th>
                                    <th>Order ID</th>
                                    <th>Customer</th>
                                    <th>Payment Method</th>
                                    <th>Amount</th>
                                    <th>Status</th>
                                    <th>Date</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>#PAY-001</td>
                                    <td>#ORD-001</td>
                                    <td>John Doe</td>
                                    <td><span class="badge bg-primary">Midtrans - BCA VA</span></td>
                                    <td>Rp 750,000</td>
                                    <td><span class="badge bg-success">Success</span></td>
                                    <td>18 Dec 2024</td>
                                    <td class="table-actions">
                                        <button class="btn btn-sm btn-info"><i class="fas fa-eye"></i></button>
                                        <button class="btn btn-sm btn-secondary"><i class="fas fa-print"></i></button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>#PAY-002</td>
                                    <td>#ORD-002</td>
                                    <td>Jane Smith</td>
                                    <td><span class="badge bg-warning">Midtrans - Gopay</span></td>
                                    <td>Rp 450,000</td>
                                    <td><span class="badge bg-warning">Pending</span></td>
                                    <td>18 Dec 2024</td>
                                    <td class="table-actions">
                                        <button class="btn btn-sm btn-info"><i class="fas fa-eye"></i></button>
                                        <button class="btn btn-sm btn-secondary"><i class="fas fa-print"></i></button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- Reports Section -->
        <div id="reports" class="content-section" style="display: none;">
            <h2 class="mb-4">Laporan Penjualan</h2>

            <div class="card shadow-sm mb-4">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-3">
                            <label>From Date</label>
                            <input type="date" class="form-control">
                        </div>
                        <div class="col-md-3">
                            <label>To Date</label>
                            <input type="date" class="form-control">
                        </div>
                        <div class="col-md-3">
                            <label>Category</label>
                            <select class="form-select">
                                <option>All Categories</option>
                                <option>Electronics</option>
                                <option>Fashion</option>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label>&nbsp;</label>
                            <button class="btn btn-primary w-100"><i class="fas fa-search me-2"></i> Generate Report</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mb-4">
                <div class="col-md-3">
                    <div class="card shadow-sm text-center">
                        <div class="card-body">
                            <i class="fas fa-chart-line fa-3x text-primary mb-3"></i>
                            <h6>Total Sales</h6>
                            <h4>Rp 45.2M</h4>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card shadow-sm text-center">
                        <div class="card-body">
                            <i class="fas fa-shopping-bag fa-3x text-success mb-3"></i>
                            <h6>Total Orders</h6>
                            <h4>890</h4>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card shadow-sm text-center">
                        <div class="card-body">
                            <i class="fas fa-users fa-3x text-info mb-3"></i>
                            <h6>New Customers</h6>
                            <h4>234</h4>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card shadow-sm text-center">
                        <div class="card-body">
                            <i class="fas fa-box fa-3x text-warning mb-3"></i>
                            <h6>Products Sold</h6>
                            <h4>1,567</h4>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card shadow-sm">
                <div class="card-header bg-white d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Sales Report</h5>
                    <div>
                        <button class="btn btn-sm btn-primary me-2"><i class="fas fa-download me-2"></i> Download Report</button>
                        <button class="btn btn-sm btn-secondary"><i class="fas fa-print"></i></button>
                    </div>
                </div>
                <div class="card-body">
                    <canvas id="salesReportChart"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection