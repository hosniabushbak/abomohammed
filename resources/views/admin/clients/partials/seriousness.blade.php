<a href="#" data-path="{{ url('admin/clients/EditSeirsWithModel/'.$row->id) }}"
   class="load-ajax-modal">
    @if($row->seriousness == 0)
        <span class="badge badge-dark">
                                            D-None
                                        </span>
    @elseif($row->seriousness == 1)
        <span class="badge badge-primary">
                                            C-Cold
                                        </span>
    @elseif($row->seriousness == 2)
        <span class="badge badge-warning">
                                               B-Warm
                                        </span>
    @elseif($row->seriousness == 3)
        <span class="badge badge-success">
                                                A-Hot
                                        </span>
    @endif
</a>
