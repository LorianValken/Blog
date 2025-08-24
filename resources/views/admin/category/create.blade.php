@extends('layouts.app')

@section('title', 'Create Category')

@push('page-styles')
<style>
  /* Base styles */
  :root {
    --primary: #4299e1;
    --primary-hover: #3182ce;
    --success: #48bb78;
    --success-hover: #38a169;
    --danger: #e53e3e;
    --gray-200: #e2e8f0;
    --gray-700: #2d3748;
    --gray-600: #4a5568;
    --light-bg: #f8f9fa;
  }
  
  /* Form container styling */
  .form-container {
    max-width: 100%;
    width: 600px;
    margin: 0 auto;
  }
  
  .card {
    border: none;
    border-radius: 12px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05), 0 4px 20px rgba(0, 0, 0, 0.08);
    overflow: hidden;
    background: white;
  }
  
  .card-body {
    padding: 1.5rem;
  }
  
  /* Header styling */
  .page-header {
    display: flex;
    flex-direction: row; /* Always row, not column */
    align-items: center;
    justify-content: space-between; /* This will push items to opposite sides */
    margin-bottom: 1.5rem;
    flex-wrap: wrap; /* Allow wrapping on small screens */
    gap: 1rem;
  }
  
  .page-title {
    font-size: 1.5rem;
    font-weight: 600;
    color: var(--light-bg);
    margin: 0;
    line-height: 1.2;
  }
  
  /* Back button specific styling */
  .back-btn {
    white-space: nowrap;
    width: auto;
    padding: 0.5rem 1rem;
    font-size: 0.875rem;
  }
  
  .back-btn i {
    margin-right: 0.5rem;
    font-size: 0.75rem;
  }
  
  /* Form element styling */
  .form-label {
    font-weight: 600;
    color: var(--gray-700);
    margin-bottom: 0.5rem;
    display: block;
    font-size: 0.9375rem;
  }
  
  .form-control {
    border: 1px solid var(--gray-200);
    border-radius: 8px;
    padding: 0.75rem;
    transition: all 0.2s ease;
    width: 100%;
    font-size: 1rem;
    line-height: 1.5;
  }
  
  .form-control:focus {
    border-color: var(--primary);
    box-shadow: 0 0 0 3px rgba(66, 153, 225, 0.2);
    outline: none;
  }
  
  .is-invalid {
    border-color: var(--danger);
  }
  
  .is-invalid:focus {
    box-shadow: 0 0 0 3px rgba(229, 62, 62, 0.2);
  }
  
  .invalid-feedback {
    color: var(--danger);
    font-size: 0.8125rem;
    margin-top: 0.375rem;
    display: flex;
    align-items: center;
    gap: 0.375rem;
  }
  
  /* Button styling */
  .btn {
    border-radius: 8px;
    padding: 0.75rem 1.25rem;
    font-weight: 600;
    transition: all 0.2s ease;
    font-size: 1rem;
    line-height: 1.5;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    text-align: center;
    border: 1px solid transparent;
  }
  
  .btn i {
    font-size: 0.875rem;
  }
  
  .btn-primary {
    background-color: var(--primary);
    color: white;
  }
  
  .btn-primary:hover {
    background-color: var(--primary-hover);
    transform: translateY(-1px);
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
  }
  
  .btn-success {
    background-color: var(--primary);
    color: white;
    width: 100px;
    padding: 10px;

  }
  
  .btn-success:hover {
    background-color: var(--primary-hover);
    transform: translateY(-1px);
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
  }
  
  .btn-lg {
    padding: 0.875rem 1.5rem;
    font-size: 1.0625rem;
  }
  
  /* Layout adjustments */
  .d-grid {
    display: grid;
  }
  
  .mt-5 {
    margin-top: 2rem;
  }
  
  .mb-4 {
    margin-bottom: 1.25rem;
  }
  
  /* Responsive adjustments */
  @media (min-width: 576px) {
    .page-header {
      flex-direction: row;
      align-items: center;
      justify-content: space-between;
    }
    
    .page-title {
      font-size: 1.75rem;
    }
    
    .card-body {
      padding: 2rem;
    }
    
    .back-btn {
      padding: 0.75rem 1.5rem;
      font-size: 1rem;
    }
  }
  
  @media (min-width: 768px) {
    .form-label {
      font-size: 1rem;
      margin-bottom: 0.75rem;
    }
    
    .invalid-feedback {
      font-size: 0.875rem;
    }
  }
  
  @media (min-width: 992px) {
    .container {
      padding-left: 1.5rem;
      padding-right: 1.5rem;
    }
  }
</style>
@endpush

@section('content')
<!-- Page content-->
<div class="container my-4 my-md-5">
  <div class="row justify-content-center">
    <div class="col-12 col-lg-8">
      <div class="page-header">
        <h1 class="page-title">Create New Category</h1>
        <a class="btn btn-success back-btn" href="{{route('admin.category.index')}}" role="button">
          <i class="fas fa-arrow-left"></i> Back
        </a>
      </div>
      
      <div class="card form-container">
        <div class="card-body">
          <form method="POST" action="{{route('admin.category.store')}}">
            @csrf
            
            <div class="mb-4">
              <label for="name" class="form-label">Category Name</label>
              <input 
                type="text" 
                class="form-control @error('name') is-invalid @enderror" 
                id="name" 
                name="name" 
                placeholder="Enter category name"
                value="{{ old('name') }}"
                aria-describedby="nameHelp"
              />
              @error('name')
                <div class="invalid-feedback">
                  <i class="fas fa-exclamation-circle"></i> {{ $message }}
                </div>
              @enderror
            </div>
            
            <div class="d-grid mt-5">
              <button type="submit" class="btn btn-primary btn-lg">
                <i class="fas fa-save me-2"></i> Create Category
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection