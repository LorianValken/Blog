@extends('layouts.app')

@section('title', 'Category List')

@push('page-styles')
<style>
  /* Modern color scheme */
  :root {
    --primary: #4361ee;
    --primary-hover: #3a56d4;
    --success: #4cc9f0;
    --danger: #dc2626;
    --light-bg: #f8f9fa;
    --dark-text: #212529;
    --border-color: #e9ecef;
    --shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
  }

  /* Container styling */
  .container {
    max-width: 1200px;
  }

  /* Header section */
  .page-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 1.5rem;
    padding-bottom: 1rem;
    border-bottom: 1px solid var(--border-color);
  }

  .page-header h3 {
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
    background: white;
  }

  .card-body {
    padding: 0;
  }

  /* Table styling */
  .table {
    width: 100%;
    margin-bottom: 0;
    color: var(--dark-text);
  }

  .table thead th {
    background-color: var(--light-bg);
    border-bottom: 2px solid var(--border-color);
    font-weight: 600;
    padding: 1rem;
    vertical-align: middle;
  }

  .table tbody td {
    padding: 1rem;
    vertical-align: middle;
    border-top: 1px solid var(--border-color);
  }

  .table tbody tr:hover {
    background-color: rgba(67, 97, 238, 0.05);
  }

  /* Action buttons */
  .action-buttons {
    display: flex;
    gap: 0.5rem;
    flex-wrap: wrap;
  }

  .btn {
    border-radius: 8px;
    font-weight: 500;
    padding: 0.5rem 1rem;
    font-size: 0.875rem;
    transition: all 0.2s ease;
    border: none;
  }

  .btn-sm {
    padding: 0.375rem 0.75rem;
    font-size: 0.8125rem;
  }

  .btn-primary {
    background-color: var(--primary);
  }

  .btn-primary:hover {
    background-color: var(--primary-hover);
    transform: translateY(-1px);
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
  }

  .btn-danger {
    background-color: var(--danger);
  }

  .btn-danger:hover {
    background-color: #e5177a;
    transform: translateY(-1px);
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
  }

  .btn-success {
    background-color: var(--success);
  }

  .btn-success:hover {
    background-color: #3ab5d8;
    transform: translateY(-1px);
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
  }

  /* Responsive adjustments */
  @media (max-width: 768px) {
    .page-header {
      flex-direction: column;
      align-items: flex-start;
      gap: 1rem;
    }

    .table thead {
      display: none;
    }

    .table, .table tbody, .table tr, .table td {
      display: block;
      width: 100%;
    }

    .table tr {
      margin-bottom: 1rem;
      border: 1px solid var(--border-color);
      border-radius: 8px;
      overflow: hidden;
    }

    .table td {
      padding: 0.75rem;
      text-align: right;
      position: relative;
    }

    .table td::before {
      content: attr(data-label);
      position: absolute;
      left: 0.75rem;
      top: 0.75rem;
      font-weight: 600;
      text-align: left;
    }

    .table td:first-child {
      background-color: var(--light-bg);
      font-weight: 600;
      text-align: left;
    }

    .table td:first-child::before {
      content: none;
    }

    .action-buttons {
      justify-content: flex-end;
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
  /* Add more as needed */
</style>
@endpush

@section('content')
<!-- Page content-->
<div class="container my-4 my-md-5">
  <div class="row">
    <div class="col-12">
      <div class="page-header">
        <h3>Category List</h3>
        <a class="btn btn-success" href="{{route('admin.category.create')}}" role="button">
          <i class="fas fa-plus me-1"></i> Create
        </a>
      </div>
      
      <div class="card">
        <div class="card-body">
          <div class="table-responsive">
            <table id="datatable" class="table table-hover">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Category</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($categories as $category)
                <tr>
                  <td data-label="No">{{ $loop->iteration }}</td>
                  <td data-label="Category">{{ $category->name }}</td>
                  <td data-label="Action">
                    <div class="action-buttons">
                      <a class="btn btn-success btn-sm" 
                         href="{{route('admin.category.edit',['id' => $category->id])}}"
                         title="Edit">
                         Edit
                        <i class="fas fa-edit"></i>
                      </a>
                      
                      <form method="POST" 
                            action="{{ route('admin.category.destroy',['id' => $category->id]) }}"
                            class="d-inline">
                        @method('DELETE')
                        @csrf
                        <button class="btn btn-danger btn-sm" 
                                type="button"
                                onclick="confirmDelete(this)"
                                title="Delete">
                                Delete
                          <i class="fas fa-trash-alt"></i>
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