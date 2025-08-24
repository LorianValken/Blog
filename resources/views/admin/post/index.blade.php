@extends('layouts.app')

@section('title', 'Post List')

@push('page-styles')

<style>
  /* Modern color scheme */
  :root {
    --primary: #4361ee;
    --primary-light: #eef2ff;
    --primary-hover: #3a56d4;
    --success: #3ab5d8;
    --success-hover: #4299e1;
    --danger: #ef4444;
    --danger-hover: #dc2626;
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
  .container-fluid {
    padding: 0 1.5rem;
    max-width: 100%;
  }

  /* Header section */
  .page-header {
    display: flex;
    flex-direction: row;
    align-items: center;
    justify-content: space-between;
    margin-bottom: 1.5rem;
    flex-wrap: wrap;
    gap: 1rem;
  }

  .page-title {
    font-size: 1.5rem;
    font-weight: 700;
    color: var(--primary-light);
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

  .card-header {
    background-color: white;
    border-bottom: 1px solid var(--border-color);
    padding: 1.5rem;
  }

  /* Table styling */
  .table-responsive {
    overflow-x: auto;
    -webkit-overflow-scrolling: touch;
    border-radius: 12px;
  }

  .table {
    width: 100%;
    margin-bottom: 0;
    color: var(--dark-text);
    border-collapse: separate;
    border-spacing: 0;
  }

  .table thead th {
    background-color: var(--light-bg);
    border-bottom: 2px solid var(--border-color);
    font-weight: 600;
    padding: 1rem;
    vertical-align: middle;
    position: sticky;
    top: 0;
    z-index: 10;
  }

  .table tbody td {
    padding: 1rem;
    vertical-align: middle;
    border-top: 1px solid var(--border-color);
  }

  .table tbody tr:hover {
    background-color: var(--primary-light);
  }

  /* Thumbnail styling */
  .thumbnail-cell {
    width: 100px;
    padding: 0.75rem;
  }

  .thumbnail-img {
    width: 100%;
    height: 60px;
    object-fit: cover;
    border-radius: 8px;
    transition: transform 0.3s ease;
  }

  .thumbnail-img:hover {
    transform: scale(1.05);
  }

  /* Tag styling - Fixed overflow */
  .tag-list {
    padding: 0;
    margin: 0;
    display: flex;
    flex-wrap: wrap;
    gap: 0.5rem;
    max-height: 100px;
    overflow-y: auto;
  }

  .tag-item {
    display: inline-block;
    padding: 0.25rem 0.75rem;
    background-color: #e2e8f0;
    border-radius: 9999px;
    font-size: 0.75rem;
    font-weight: 500;
    color: #475569;
    transition: all 0.2s ease;
    white-space: nowrap;
  }

  .tag-item:hover {
    background-color: #cbd5e1;
    color: #334155;
  }

  /* Action buttons */
  .action-buttons {
    display: flex;
    gap: 0.75rem;
    flex-wrap: wrap;
  }

  .btn {
    border-radius: 8px;
    font-weight: 500;
    padding: 0.5rem 1rem;
    font-size: 0.875rem;
    transition: all 0.2s ease;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 0.5rem;
  }

  .btn-sm {
    padding: 0.375rem 0.75rem;
    font-size: 0.8125rem;
  }

  .btn-primary {
    background-color: var(--primary);
    color: white;
    border: none;
  }

  .btn-primary:hover {
    background-color: var(--primary-hover);
    transform: translateY(-1px);
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
  }

  .btn-danger {
    background-color: var(--danger);
    color: white;
    border: none;
  }

  .btn-danger:hover {
    background-color: var(--danger-hover);
    transform: translateY(-1px);
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
  }

  .btn-success {
    background-color: var(--success);
    color: white;
    border: none;
  }

  .btn-success:hover {
    background-color: var(--success-hover);
    transform: translateY(-1px);
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
  }

  /* Pagination */
  .pagination {
    justify-content: center;
    margin-top: 2rem;
  }

  .page-item.active .page-link {
    background-color: var(--primary);
    border-color: var(--primary);
  }

  .page-link {
    color: var(--primary);
  }

  /* Responsive adjustments */
  @media (max-width: 992px) {
    .page-header {
      flex-direction: row;
      align-items: center;
      justify-content: space-between;
    }

    .table thead {
      display: none;
    }

    .table, .table tbody, .table tr, .table td {
      display: block;
      width: 100%;
    }

    .table tr {
      margin-bottom: 1.5rem;
      border: 1px solid var(--border-color);
      border-radius: 12px;
      overflow: hidden;
      position: relative;
      padding-top: 3rem;
    }

    .table td {
      padding: 0.75rem 1rem;
      text-align: right;
      position: relative;
      border-top: none;
    }

    .table td::before {
      content: attr(data-label);
      position: absolute;
      left: 1rem;
      top: 0.75rem;
      font-weight: 600;
      text-align: left;
      color: var(--primary);
    }

    .table td:first-child {
      background-color: var(--light-bg);
      font-weight: 600;
      text-align: left;
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      padding: 0.75rem 1rem;
      border-bottom: 1px solid var(--border-color);
    }

    .table td:first-child::before {
      content: none;
    }

    .thumbnail-cell {
      text-align: center;
    }

    .thumbnail-img {
      width: auto;
      max-width: 100%;
      height: auto;
      max-height: 120px;
    }

    .action-buttons {
      justify-content: flex-end;
    }

    /* Adjust tag list for mobile */
    .tag-list {
      max-height: none;
      overflow-y: visible;
      justify-content: flex-end;
    }
  }

 @media (max-width: 576px) {
  .action-buttons {
    flex-direction: row !important;
    justify-content: center !important; /* Center the buttons */
    gap: 0.5rem;
  }
 }

  /* Animation */
  @keyframes fadeIn {
    from { opacity: 0; transform: translateY(10px); }
    to { opacity: 1; transform: translateY(0); }
  }

  .table tbody tr {
    animation: fadeIn 0.3s ease forwards;
  }

  .table tbody tr:nth-child(1) { animation-delay: 0.1s; }
  .table tbody tr:nth-child(2) { animation-delay: 0.2s; }
  .table tbody tr:nth-child(3) { animation-delay: 0.3s; }
</style>
@endpush

@section('content')
<!-- Page content-->
<div class="container-fluid my-4 my-md-5">
  <div class="row">
    <div class="col-12">
      <div class="page-header">
        <h1 class="page-title">Post List</h1>
        <a class="btn btn-success" href="{{route('admin.post.create')}}" role="button">
          <i class="fas fa-plus me-1"></i> Create Post
        </a>
      </div>
      
      <div class="card">
        <div class="card-header">
          <div class="d-flex justify-content-between align-items-center">
            <h5 class="mb-0">All Posts</h5>
            <div class="d-flex align-items-center">
              <span class="badge bg-primary me-2">{{ $posts->total() }} Posts</span>
            </div>
          </div>
        </div>
        <div class="card-body p-0">
          <div class="table-responsive">
            <table id="datatable" class="table table-hover mb-0">
              <thead>
                <tr>
                  <th width="5%">No</th>
                  <th width="15%">Author</th>
                  <th width="10%">Thumbnail</th>
                  <th>Title</th>
                  <th width="12%">Category</th>
                  <th width="15%">Tags</th>
                  <th width="12%">Actions</th>
                </tr>
              </thead>
              <tbody>
                @foreach($posts as $post)
                <tr>
                  <td data-label="No">{{ ($posts->currentPage() - 1) * $posts->perPage() + $loop->iteration }}</td>
                  <td data-label="Author">{{ $post->users?->email }}</td>
                  <td data-label="Thumbnail" class="thumbnail-cell">
                    <img class="thumbnail-img" src="{{ $post->image }}" alt="{{ $post->title }} thumbnail">
                  </td>
                  <td data-label="Title">{{ Str::limit($post->title, 50) }}</td>
                  <td data-label="Category">{{ $post->category->name ?? 'Uncategorized' }}</td>
                  <td data-label="Tags">
                    <ul class="tag-list">
                      @foreach($post->tags as $tag)
                      <li class="tag-item">{{ $tag->name }}</li>
                      @endforeach
                    </ul>
                  </td>
                  <td data-label="Actions">
                    <div class="action-buttons">
                      <a class="btn btn-success btn-sm" 
                         href="{{ route('admin.post.edit', ['id' => $post->id]) }}"
                         title="Edit">
                         <i class="fas fa-edit"></i>Edit
                      </a>                      
                      <form method="POST" 
                            class="delete-form d-inline"
                            action="{{ route('admin.post.destroy', ['id' => $post->id]) }}">
                            @method('DELETE')
                            @csrf
                            <button class="btn btn-danger btn-sm"
                                type="button"
                                onclick="confirmDelete(this)"
                                title="Delete">
                                <i class="fas fa-trash-alt"></i>Delete
                            </button>
                      </form>
                    </div>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
      <!-- Pagination -->
      <div class="card-footer">
        {{ $posts->links() }}
      </div>
    </div>
  </div>
</div>
@endsection

@push('page-scripts')
<script>
  // Advanced delete confirmation
  function confirmDelete(button) {
    // Find the parent form of the clicked button
    const form = button.closest('form');
    
    Swal.fire({
      title: 'Delete Confirmation',
      text: "Are you sure you want to delete this post? This action cannot be undone.",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonText: 'Yes, delete it!',
      cancelButtonText: 'Cancel',
      buttonsStyling: false,
      customClass: {
        confirmButton: 'btn btn-danger mx-2',
        cancelButton: 'btn btn-secondary mx-2'
      },
      showClass: {
        popup: 'animate__animated animate__fadeIn animate__faster'
      },
      hideClass: {
        popup: 'animate__animated animate__fadeOut animate__faster'
      }
    }).then((result) => {
      if (result.isConfirmed) {
        form.submit();
      }
    });
  }
</script>
@endpush