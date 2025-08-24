<div class="card mb-4 search-card">
  @push('page-styles')
    <style>
      .search-card {
        border: none;
        border-radius: 18px;
        background: rgba(255, 255, 255, 0.08);
        backdrop-filter: blur(12px);
        -webkit-backdrop-filter: blur(12px);
        box-shadow: 
          0 8px 32px rgba(0, 0, 0, 0.18),
          inset 0 1px 1px rgba(255, 255, 255, 0.1);
        overflow: hidden;
        transition: all 0.4s cubic-bezier(0.215, 0.61, 0.355, 1);
        border: 1px solid rgba(255, 255, 255, 0.08);
      }
      
      .search-card:hover {
        transform: translateY(-4px);
        box-shadow: 
          0 12px 40px rgba(0, 0, 0, 0.25),
          inset 0 1px 1px rgba(255, 255, 255, 0.15);
      }
      
      .search-card .card-header {
        background: linear-gradient(135deg, 
          rgba(106, 17, 203, 0.8) 0%, 
          rgba(37, 117, 252, 0.8) 100%);
        color: white;
        font-weight: 600;
        font-size: 1.2rem;
        letter-spacing: 0.8px;
        border-bottom: none;
        padding: 1.25rem 2rem;
        position: relative;
        overflow: hidden;
      }
      
      .search-card .card-header::before {
        content: '';
        position: absolute;
        top: -50%;
        left: -50%;
        width: 200%;
        height: 200%;
        background: linear-gradient(
          to bottom right,
          rgba(255,255,255,0.1) 0%,
          rgba(255,255,255,0) 50%,
          rgba(255,255,255,0.1) 100%
        );
        transform: rotate(30deg);
        animation: shine 6s infinite linear;
      }
      
      @keyframes shine {
        0% { transform: translateX(-100%) rotate(30deg); }
        100% { transform: translateX(100%) rotate(30deg); }
      }
      
      .search-card .card-header i {
        filter: drop-shadow(0 2px 4px rgba(0,0,0,0.2));
      }
      
      .search-card .card-body {
        padding: 2rem;
        background: transparent;
      }
      
      .search-card .input-group {
        position: relative;
        display: flex;
        width: 100%;
        border-radius: 12px;
        overflow: hidden;
      }
      
      .search-card .form-control {
        height: 56px;
        border-radius: 12px 0 0 12px;
        border: none;
        padding: 0 1.5rem;
        font-size: 1rem;
        background: rgba(255, 255, 255, 0.1);
        color: white;
        transition: all 0.4s ease;
        box-shadow: inset 0 1px 3px rgba(0, 0, 0, 0.2);
        backdrop-filter: blur(4px);
      }
      
      .search-card .form-control:focus {
        background: rgba(255, 255, 255, 0.15);
        box-shadow: 
          inset 0 1px 3px rgba(0, 0, 0, 0.2),
          0 0 0 3px rgba(79, 70, 229, 0.3);
        outline: none;
      }
      
      .search-card .form-control::placeholder {
        color: rgba(255, 255, 255, 0.6);
        opacity: 1;
      }
      
      .search-card .btn-primary {
        height: 56px;
        border-radius: 0 12px 12px 0;
        background: linear-gradient(135deg, 
          rgba(79, 70, 229, 0.9) 0%, 
          rgba(124, 58, 237, 0.9) 100%);
        border: none;
        padding: 0 2rem;
        font-weight: 600;
        letter-spacing: 1px;
        font-size: 0.95rem;
        box-shadow: 
          0 4px 15px rgba(79, 70, 229, 0.3),
          inset 0 1px 1px rgba(255, 255, 255, 0.2);
        transition: all 0.4s cubic-bezier(0.215, 0.61, 0.355, 1);
        position: relative;
        overflow: hidden;
      }
      
      .search-card .btn-primary::after {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: linear-gradient(
          to right,
          rgba(255,255,255,0) 0%,
          rgba(255,255,255,0.2) 50%,
          rgba(255,255,255,0) 100%
        );
        transform: translateX(-100%);
        transition: transform 0.6s ease;
      }
      
      .search-card .btn-primary:hover {
        background: linear-gradient(135deg, 
          rgba(67, 56, 202, 0.9) 0%, 
          rgba(109, 40, 217, 0.9) 100%);
        box-shadow: 
          0 6px 20px rgba(79, 70, 229, 0.4),
          inset 0 1px 1px rgba(255, 255, 255, 0.3);
        transform: translateY(-2px);
      }
      
      .search-card .btn-primary:hover::after {
        transform: translateX(100%);
      }
      
      .search-card .btn-primary:active {
        transform: translateY(0);
      }
      
      .search-card .btn-primary i {
        margin-right: 8px;
        font-size: 1.1rem;
        transition: transform 0.3s ease;
      }
      
      .search-card .btn-primary:hover i {
        transform: scale(1.1);
      }
      
      /* Glow animation when focused */
      @keyframes glow {
        0% { box-shadow: 0 0 0 0 rgba(79, 70, 229, 0.5); }
        100% { box-shadow: 0 0 20px 10px rgba(79, 70, 229, 0); }
      }
      
      .search-card .form-control:focus {
        animation: glow 1.5s infinite alternate;
      }
      
      /* Responsive adjustments */
      @media (max-width: 768px) {
        .search-card {
          border-radius: 14px;
        }
        
        .search-card .card-header {
          padding: 1rem 1.5rem;
          font-size: 1.1rem;
        }
        
        .search-card .card-body {
          padding: 1.5rem;
        }
        
        .search-card .form-control,
        .search-card .btn-primary {
          height: 48px;
        }
        
        .search-card .btn-primary {
          padding: 0 1.5rem;
        }
      }
    </style>
  @endpush
    <div class="card-header">
      <i class="fas fa-search mr-2"></i>EXPLORE CONTENT
    </div>
    <div class="card-body">
      <form method="GET" action="{{route('home')}}">
        @foreach (collect(request()->query())->only(['category_id', 'tag_id']) as $key => $value)
            <input type="hidden" name="{{$key}}" value="{{$value}}">
        @endforeach
        <div class="input-group">
          <input
            class="form-control"
            name="search"
            type="text"
            placeholder="Discover amazing content..."
            aria-label="Search posts"
            aria-describedby="button-search"
            value="{{ request('search') }}"
          />
          <button
            class="btn btn-primary"
            id="button-search"
            type="submit"
          >
            <i class="fas fa-search"></i> SEARCH
          </button>
        </div>
      </form>
    </div>
</div>