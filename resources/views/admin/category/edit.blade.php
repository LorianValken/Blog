@extends('layouts.app')

@section('title', 'Edit Category')

@push('page-styles')
<style>
  /* Modern color scheme */
  :root {
    --primary: #4361ee;
    --primary-hover: #3a56d4;
    --success: #4cc9f0;
    --danger: #f72585;
    --light-bg: #f8f9fa;
    --dark-text: #212529;
    --border-color: #e9ecef;
    --shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
  }

  /* Form container */
  .form-container {
    max-width: 600px;
    margin: 0 auto;
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
    font-size: 1.75rem;
    font-weight: 600;
    color: var(--light-bg);
    margin: 0;
  }

  /* Card styling */
  .card {
    border: none;
    border-radius: 12px;
    box-shadow: var(--shadow);
    overflow: hidden;
  }

  .card-body {
    padding: 2rem;
  }

  /* Form elements */
  .form-label {
    font-weight: 600;
    color: var(--dark-text);
    margin-bottom: 0.75rem;
    display: block;
  }

  .form-control {
    border: 1px solid var(--border-color);
    border-radius: 8px;
    padding: 0.75rem 1rem;
    transition: all 0.3s ease;
    width: 100%;
    font-size: 1rem;
  }

  .form-control:focus {
    border-color: var(--primary);
    box-shadow: 0 0 0 3px rgba(67, 97, 238, 0.2);
    outline: none;
  }

  /* Button styling */
  .btn {
    border-radius: 8px;
    padding: 0.75rem 1.5rem;
    font-weight: 600;
    transition: all 0.3s ease;
    border: none;
  }

  .btn-primary {
    background-color: var(--primary);
  }

  .btn-primary:hover {
    background-color: var(--primary-hover);
    transform: translateY(-2px);
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
  }

  .btn-success {
    background-color: var(--success);
    width: 100px;
    padding: 10px;
  }

  .btn-success:hover {
    background-color: #3ab5d8;
    transform: translateY(-2px);
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
  }

  /* Responsive adjustments */
  @media (min-width: 768px) {
    .page-header {
      flex-direction: row;
      align-items: center;
      justify-content: space-between;
    }
    
    .card-body {
      padding: 2.5rem;
    }
  }

  /* Error handling */
  .is-invalid {
    border-color: var(--danger);
  }

  .invalid-feedback {
    color: var(--danger);
    font-size: 0.875rem;
    margin-top: 0.5rem;
  }
</style>
@endpush

@section('content')
<!-- Page content-->
<div class="container my-4 my-md-5">
  <div class="row justify-content-center">
    <div class="col-lg-8">
      <div class="page-header">
        <h1 class="page-title">Edit Category: {{ $category->name }}</h1>
        <a class="btn btn-success" href="{{route('admin.category.index')}}" role="button">
          <i class="fas fa-arrow-left me-2"></i>
          Back
        </a>
      </div>
      
      <div class="card form-container">
        <div class="card-body">
          <form method="POST" action="{{ route('admin.category.update', ['id' => $category->id])}}">
            @method('PUT')
            @csrf
            
            <div class="mb-4">
              <label for="name" class="form-label">Category Name</label>
              <input 
                type="text" 
                class="form-control @error('name') is-invalid @enderror" 
                id="name" 
                name="name" 
                value="{{ old('name', $category->name) }}"
                placeholder="Enter category name"
              />
              @error('name')
                <div class="invalid-feedback">
                  <i class="fas fa-exclamation-circle me-1"></i> {{ $message }}
                </div>
              @enderror
            </div>
            
            <div class="d-grid mt-4">
              <button type="submit" class="btn btn-primary btn-lg">
                <i class="fas fa-save me-2"></i> Update Category
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection