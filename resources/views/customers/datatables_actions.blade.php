<div class='btn-group btn-group-sm'>
    <a data-toggle="tooltip" data-placement="bottom" title="{{'Edit'}}" href="#" class='btn btn-link'>
      <i class="fa fa-edit"></i>
    </a>


  {!! Form::open(['method' => 'delete']) !!}
    {!! Form::button('<i class="fa fa-trash"></i>', [
    'type' => 'submit',
    'class' => 'btn btn-link text-danger',
    'onclick' => "return confirm('Are you sure?')"
    ]) !!}
  {!! Form::close() !!}
  </div>
