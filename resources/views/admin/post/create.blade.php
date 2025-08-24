@extends('layouts.app')

@section('title', 'Create Post')

@push('page-styles')
<style>
  /* Form container styling */
  .form-container {
    max-width: 800px;
    margin: 0 auto;
  }
  
  .card {
    border: none;
    border-radius: 12px;
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
    overflow: hidden;
  }
  
  .card-header {
    background: linear-gradient(135deg, #6a11cb 0%, #2575fc 100%);
    color: white;
    padding: 1.5rem;
    border-bottom: none;
  }
  
  .card-body {
    padding: 2rem;
  }
  
  /* Form element styling */
  .form-label {
    font-weight: 600;
    color: #2d3748;
    margin-bottom: 0.5rem;
  }
  
  .form-control, .form-select {
    border: 1px solid #e2e8f0;
    border-radius: 8px;
    padding: 0.75rem 1rem;
    transition: all 0.3s ease;
  }
  
  .form-control:focus, .form-select:focus {
    border-color: #4299e1;
    box-shadow: 0 0 0 3px rgba(66, 153, 225, 0.2);
    outline: none;
  }
  
  textarea.form-control {
    min-height: 200px;
    resize: vertical;
  }
  
  /* Tag selection styling */
  .tag-wrapper {
    display: flex;
    flex-wrap: wrap;
    gap: 0.75rem;
    margin-top: 0.5rem;
  }
  
  .form-check-inline {
    margin-right: 0;
  }
  
  .form-check-input {
    width: 1.2em;
    height: 1.2em;
    margin-top: 0.15em;
    border: 2px solid #cbd5e0;
  }
  
  .form-check-input:checked {
    background-color: #4299e1;
    border-color: #4299e1;
  }
  
  .form-check-label {
    margin-left: 0.5rem;
    color: #4a5568;
  }
  
  /* Button styling */
  .btn {
    border-radius: 8px;
    padding: 0.75rem 1.5rem;
    font-weight: 600;
    transition: all 0.3s ease;
  }
  
  .btn-primary {
    background-color: #4299e1;
    border-color: #4299e1;
  }
  
  .btn-primary:hover {
    background-color: #3182ce;
    border-color: #3182ce;
    transform: translateY(-2px);
  }
  
  .btn-success {
    background-color: #3182ce;
    border-color: #3182ce;
    padding: 10px;
  }
  
  .btn-success:hover {
    background-color: #3182ce;
    border-color: #3182ce;
    transform: translateY(-2px);
  }
  
  /* Error message styling */
  .alert-danger {
    border-radius: 8px;
    background-color: #fff5f5;
    border: 1px solid #fed7d7;
    color: #e53e3e;
    margin-top: 1.5rem;
  }
  
  /* File upload styling */
  .file-upload-wrapper {
    position: relative;
    margin-bottom: 1.5rem;
  }
  
  .file-upload-label {
    display: block;
    padding: 1.5rem;
    border: 2px dashed #e2e8f0;
    border-radius: 8px;
    text-align: center;
    cursor: pointer;
    transition: all 0.3s ease;
  }
  
  .file-upload-label:hover {
    border-color: #4299e1;
    background-color: #f8fafc;
  }
  
  .file-upload-input {
    position: absolute;
    left: 0;
    top: 0;
    opacity: 0;
    width: 100%;
    height: 100%;
    cursor: pointer;
  }
  
  /* Responsive adjustments */
  @media (max-width: 768px) {
    .card-body {
      padding: 1.5rem;
    }
    
    .tag-wrapper {
      gap: 0.5rem;
    }
  }
</style>
@endpush

@section('content')
<!-- Page content-->
<div class="container my-5">
  <div class="row justify-content-center">
    <div class="col-lg-10">
      <div class="d-flex justify-content-between align-items-center mb-4">
        <h3 class="mb-0">Create New Post</h3>
        <a class="btn btn-success" href="{{route('admin.post.index')}}" role="button">
          <i class="fas fa-arrow-left me-2"></i> Back to Posts
        </a>
      </div>
      
      <div class="card form-container">
        <div class="card-body">
          <form method="POST" action="{{route('admin.post.store')}}" enctype="multipart/form-data">
            @csrf
            
            <div class="mb-4">
              <label for="title" class="form-label">Post Title</label>
              <input type="text" class="form-control" id="title" name="title" placeholder="Enter post title">
            </div>
            
            <div class="mb-4">
              <label for="content" class="form-label">Post Content</label>
              <textarea class="form-control" id="content" name="content" rows="8" placeholder="Write your post content here..."></textarea>
            </div>
            
            <div class="mb-4">
              <label class="form-label">Thumbnail Image</label>
              <div class="file-upload-wrapper">
                <label for="thumbnail" class="file-upload-label">
                  <i class="fas fa-cloud-upload-alt fa-2x mb-2" style="color: #718096;"></i>
                  <p class="mb-1">Click to upload or drag and drop</p>
                  <p class="text-muted small">PNG, JPG up to 2MB</p>
                </label>
                <input class="file-upload-input" type="file" id="thumbnail" name="thumbnail">
              </div>
            </div>
            
            <div class="mb-4">
              <label for="category" class="form-label">Category</label>
              <select class="form-select" name="category_id" id="category">
                <option selected disabled>Select a category</option>
                @foreach($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
              </select>
            </div>
            
            <div class="mb-4">
              <label class="form-label">Tags</label>
              <div class="tag-wrapper">
                @foreach($tags as $tag)
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" name="tags[]" value="{{ $tag->id }}" id="tag{{ $tag->id }}">
                  <label class="form-check-label" for="tag{{ $tag->id }}">{{ $tag->name }}</label>
                </div>
                @endforeach
              </div>
            </div>
            
            <div class="d-grid mt-5">
              <button type="submit" class="btn btn-primary btn-lg">
                <i class="fas fa-paper-plane me-2"></i> Publish Post
              </button>
            </div>
          </form>
        </div>
      </div>
        
      @if ($errors->any())
      <div class="alert alert-danger mt-4">
        <h5 class="alert-heading">Oops! There were some errors:</h5>
        <ul class="mb-0">
          @foreach( $errors->all() as $error )
          <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
      @endif
    </div>
  </div>
</div>
@endsection