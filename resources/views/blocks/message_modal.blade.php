<div class="modal fade" id="MessageModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="{{ route('message_send') }}" method="post">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">
                        <img id="Mphoto" src="" alt="people">
                        <div class="tt">{{ trans('message.new_message') }}</div>
                    </h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <span>{{ trans('message.maker') }} :</span>
                        <span id="Mname"></span>
                    </div>
                    <div class="form-group">
                        <textarea name="message" class="form-control" id="message" placeholder="{{ trans('message.message') }}"  rows="7"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    {!! csrf_field() !!}
                    <input type="hidden" id="Mto" name="to_id">
                    <button type="submit" id="saveBtn" class="btn">{{ trans('message.send') }}</button>
                </div>
            </form>
        </div>
    </div>
</div>