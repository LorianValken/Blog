@extends('layouts.app')

@section('title', 'Update Post')

@push('page-styles')
<style>
  /* Modern color scheme */
  :root {
    --primary: #3182ce;
    --primary-hover: #3182ce;
    --success: #3182ce;
    --success-hover: #3182ce;
    --danger: #ef4444;
    --light-bg: #f8fafc;
    --dark-text: #1e293b;
    --border-color: #e2e8f0;
    --shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
    --card-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
  }

  /* Base styles */
  body {
    background-color: #f1f5f9;
  }

  /* Container styling */
  .container {
    padding: 0 1.5rem;
    max-width: 1200px;
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
    font-weight: 700;
    color: var(--light-bg);
    margin: 0;
  }

  /* Card styling */
  .card {
    border: none;
    border-radius: 12px;
    box-shadow: var(--card-shadow);
    overflow: hidden;
    background: white;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
  }

  .card:hover {
    transform: translateY(-2px);
    box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1);
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

  .form-control, 
  .form-select {
    border: 1px solid var(--border-color);
    border-radius: 8px;
    padding: 0.75rem 1rem;
    transition: all 0.3s ease;
    width: 100%;
    font-size: 1rem;
    background-color: var(--light-bg);
  }

  .form-control:focus,
  .form-select:focus {
    border-color: var(--primary);
    box-shadow: 0 0 0 3px rgba(67, 97, 238, 0.2);
    outline: none;
    background-color: white;
  }

  textarea.form-control {
    min-height: 200px;
    resize: vertical;
  }

  /* File upload styling */
  .file-upload-wrapper {
    position: relative;
    margin-bottom: 1.5rem;
  }

  .file-upload-label {
    display: block;
    padding: 1.5rem;
    border: 2px dashed var(--border-color);
    border-radius: 8px;
    text-align: center;
    cursor: pointer;
    transition: all 0.3s ease;
  }

  .file-upload-label:hover {
    border-color: var(--primary);
    background-color: var(--light-bg);
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

  /* Tag selection styling */
  .tag-wrapper {
    display: flex;
    flex-wrap: wrap;
    gap: 1rem;
    margin-top: 0.5rem;
  }

  .form-check-inline {
    margin-right: 0;
  }

  .form-check-input {
    width: 1.2em;
    height: 1.2em;
    margin-top: 0.15em;
    border: 2px solid var(--border-color);
  }

  .form-check-input:checked {
    background-color: var(--primary);
    border-color: var(--primary);
  }

  .form-check-label {
    margin-left: 0.5rem;
    color: var(--dark-text);
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
    color: white;
  }

  .btn-primary:hover {
    background-color: var(--primary-hover);
    transform: translateY(-2px);
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
  }

  .btn-success {
    background-color: var(--success);
    color: white;
    padding: 10px;
  }

  .btn-success:hover {
    background-color: var(--success-hover);
    transform: translateY(-2px);
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
  }

  /* Responsive adjustments */
  @media (max-width: 768px) {
    .card-body {
      padding: 1.5rem;
    }
    
    .tag-wrapper {
      gap: 0.5rem;
    }
    
    .btn {
      width: 100%;
    }
    .btn-success {
      background-color: var(--success);
      color: white;
      padding: 10px;
      width: 100px;
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
    <div class="col-lg-10">
      <div class="page-header">
        <h1 class="page-title">Update Post: {{ $post->title }}</h1>
        <a class="btn btn-success" href="{{route('admin.post.index')}}" role="button">
          <i class="fas fa-arrow-left me-2"></i>Back
        </a>
      </div>
      
      <div class="card">
        <div class="card-body">
          <form method="POST" action="{{ route('admin.post.update', ['id' => $post->id]) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            
            <div class="mb-4">
              <label for="title" class="form-label">Title</label>
              <input
                type="text"
                class="form-control"
                id="title"
                name="title"
                value="{{ $post->title }}"
                placeholder="Enter post title"
              />
            </div>
            
            <div class="mb-4">
              <label for="content" class="form-label">Content</label>
              <textarea
                class="form-control"
                id="content"
                name="content"
                rows="8"
                placeholder="Write your post content here..."
              >{{ $post->content }}</textarea>
            </div>
            
            <div class="mb-4">
              <label class="form-label">Thumbnail Image</label>
              <div class="file-upload-wrapper">
                <label for="thumbnail" class="file-upload-label">
                  <i class="fas fa-cloud-upload-alt fa-2x mb-2" style="color: #64748b;"></i>
                  <p class="mb-1">Click to upload or drag and drop</p>
                  <p class="text-muted small">Current: {{ basename($post->image) }}</p>
                </label>
                <input class="file-upload-input" type="file" id="thumbnail" name="thumbnail">
              </div>
            </div>
            
            <div class="mb-4">
              <label for="category" class="form-label">Category</label>
              <select class="form-select" name="category_id" id="category">
                <option disabled>Select a category</option>
                @foreach ($categories as $category)
                <option value="{{ $category->id }}" {{ $category->id == $post->category_id ? 'selected' : '' }}>
                  {{ $category->name }}
                </option>
                @endforeach
              </select>
            </div>
            
            <div class="mb-4">
              <label class="form-label">Tags</label>
              <div class="tag-wrapper">
                @foreach ($tags as $tag)
                <div class="form-check">
                  <input class="form-check-input" 
                         type="checkbox" 
                         name="tags[]" 
                         value="{{ $tag->id }}" 
                         id="tag{{ $tag->id }}"
                         {{ in_array($tag->id, $post->tags->pluck('id')->toArray()) ? 'checked' : '' }}>
                  <label class="form-check-label" for="tag{{ $tag->id }}">{{ $tag->name }}</label>
                </div>
                @endforeach
              </div>
            </div>
            
            <div class="d-grid mt-5">
              <button type="submit" class="btn btn-primary btn-lg">
                <i class="fas fa-save me-2"></i> Update Post
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection