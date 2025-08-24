<div class="card mb-4">
  @push('page-styles')
    <style>
      .sidebar-tags-card {
        border-radius: 16px;
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.08);
        border: none;
        overflow: hidden;
        background: rgba(255, 255, 255, 0.9);
        backdrop-filter: blur(8px);
        -webkit-backdrop-filter: blur(8px);
        border: 1px solid rgba(255, 255, 255, 0.2);
      }
      
      .sidebar-tags-card .card-header {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
        font-weight: 600;
        font-size: 1.1rem;
        letter-spacing: 0.5px;
        border-bottom: none;
        padding: 1.25rem 1.5rem;
        text-align: center;
        text-shadow: 0 1px 2px rgba(0, 0, 0, 0.1);
      }
      
      .sidebar-tags-card .card-body {
        padding: 1.5rem;
        background: transparent;
      }
      
      .sidebar-item-tag {
        display: inline-block;
        margin-bottom: 0.75rem;
        transition: all 0.3s cubic-bezier(0.25, 0.8, 0.25, 1);
        width: 100%;
      }
      
      .sidebar-item-tag a {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 0.6rem 1rem;
        text-decoration: none;
        color: white;
        font-size: 0.9rem;
        font-weight: 500;
        border-radius: 12px;
        background: linear-gradient(135deg, #6c757d 0%, #495057 100%);
        box-shadow: 0 3px 6px rgba(0, 0, 0, 0.1);
        transition: all 0.3s cubic-bezier(0.25, 0.8, 0.25, 1);
        border: none;
        position: relative;
        overflow: hidden;
      }
      
      .sidebar-item-tag a:hover {
        transform: translateY(-3px);
        box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15);
        text-decoration: none;
      }
      
      .sidebar-item-tag a::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: linear-gradient(rgba(255,255,255,0.1), rgba(255,255,255,0));
        opacity: 0;
        transition: opacity 0.3s ease;
      }
      
      .sidebar-item-tag a:hover::before {
        opacity: 1;
      }
      
      /* Different colors for tags */
      .sidebar-item-tag:nth-child(6n+1) a {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
      }
      
      .sidebar-item-tag:nth-child(6n+2) a {
        background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);
      }
      
      .sidebar-item-tag:nth-child(6n+3) a {
        background: linear-gradient(135deg, #43e97b 0%, #38f9d7 100%);
      }
      
      .sidebar-item-tag:nth-child(6n+4) a {
        background: linear-gradient(135deg, #ff9a9e 0%, #fad0c4 100%);
      }
      
      .sidebar-item-tag:nth-child(6n+5) a {
        background: linear-gradient(135deg, #ff758c 0%, #ff7eb3 100%);
      }
      
      .sidebar-item-tag:nth-child(6n+6) a {
        background: linear-gradient(135deg, #a18cd1 0%, #fbc2eb 100%);
      }
      
      .badge-light {
        background-color: rgba(255, 255, 255, 0.2) !important;
        color: white !important;
        font-weight: 600;
        padding: 0.25em 0.6em;
        border-radius: 10px;
      }
      
      /* Responsive adjustments */
      @media (max-width: 768px) {
        .sidebar-tags-card .card-body {
          padding: 1.25rem;
        }
        
        .sidebar-item-tag {
          margin-bottom: 0.6rem;
        }
        
        .sidebar-item-tag a {
          padding: 0.5rem 0.9rem;
          font-size: 0.85rem;
        }
      }
    </style>
  @endpush
    <div class="card-header">
      <i class="fas fa-tags mr-2"></i>Popular Tags
    </div>
    <div class="card-body">
      <div class="row">
        @foreach ($sidebar_tags as $sidebar_tag)
          <div class="col-sm-6 sidebar-item-tag">
            <a href="{{route('home', ['tag_id' => $sidebar_tag->id])}}">
              <span>{{$sidebar_tag->name}}</span>
              @if($sidebar_tag->posts_count ?? false)
                <span class="badge badge-light">{{$sidebar_tag->posts_count}}</span>
              @endif
            </a>
          </div>
        @endforeach
      </div>
    </div>
</div>