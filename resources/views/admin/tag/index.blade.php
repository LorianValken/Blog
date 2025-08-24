@extends('layouts.app')

@section('title', 'Tag List')

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
    padding: 0 1rem;
  }

  /* Header section - Fixed alignment */
  .page-header {
    display: flex;
    flex-direction: row;
    align-items: center;
    justify-content: space-between;
    margin-bottom: 1.5rem;
    flex-wrap: wrap;
    gap: 1rem;
  }

  .page-header h3 {
    font-size: 1.5rem;
    font-weight: 600;
    --light-bg: #f8f9fa;
    color: var();
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

  /* Table styling */
  .table-responsive {
    overflow-x: auto;
    -webkit-overflow-scrolling: touch;
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
    display: inline-flex;
    align-items: center;
    justify-content: center;
  }

  .btn-sm {
    padding: 0.375rem 0.75rem;
    font-size: 0.8125rem;
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

  .btn-danger {
    background-color: var(--danger);
    color: white;
  }

  .btn-danger:hover {
    background-color: #e5177a;
    transform: translateY(-1px);
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
  }

  /* Create button styling */
  .btn-success {
    background-color: var(--success);
    color: white;
  }

  .btn-success:hover {
    background-color: #3ab5d8;
    transform: translateY(-1px);
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
  }

  /* Responsive adjustments */
  @media (max-width: 768px) {
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
      position: relative;
      padding-top: 2rem;
    }

    .table td {
      padding: 0.5rem 1rem;
      text-align: right;
      position: relative;
      border-top: none;
    }

    .table td::before {
      content: attr(data-label);
      position: absolute;
      left: 1rem;
      top: 0.5rem;
      font-weight: 600;
      text-align: left;
    }

    .table td:first-child {
      background-color: var(--light-bg);
      font-weight: 600;
      text-align: left;
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      padding: 0.5rem 1rem;
      border-bottom: 1px solid var(--border-color);
    }

    .table td:first-child::before {
      content: none;
    }

    .action-buttons {
      justify-content: flex-end;
    }
  }

  @media (min-width: 576px) {
    .page-header h3 {
      font-size: 1.75rem;
    }
    
    .container {
      padding: 0 1.5rem;
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
<div class="container my-4 my-md-5">
  <div class="row">
    <div class="col-12">
      <div class="page-header">
        <h3>Tag List</h3>
        <a class="btn btn-success" href="{{route('admin.tag.create')}}" role="button">
          <i class="fas fa-plus me-1"></i>Create
        </a>
      </div>
      <div class="card">
        <div class="card-body p-0">
          <div class="table-responsive">
            <table id="datatable" class="table table-hover mb-0">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Tag</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($tags as $tag)
                <tr>
                  <td data-label="No">{{ $loop->iteration }}</td>
                  <td data-label="Tag">{{ $tag->name }}</td>
                  <td data-label="Action">
                    <div class="action-buttons">
                      <a class="btn btn-success btn-sm" 
                         href="{{route('admin.tag.edit',['id' => $tag->id])}}"
                         title="Edit">
                         <i class="fas fa-edit me-1"></i> Edit
                      </a>
                      
                      <form method="POST" 
                            action="{{ route('admin.tag.destroy',['id' => $tag->id]) }}"
                            class="d-inline">
                        @method('DELETE')
                        @csrf
                        <button class="btn btn-danger btn-sm" 
                                type="button"
                                onclick="confirmDelete(this)"
                                title="Delete">
                                <i class="fas fa-trash-alt me-1"></i> Delete
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