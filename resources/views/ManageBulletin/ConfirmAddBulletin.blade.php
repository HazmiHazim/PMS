<a href="{{ route('manage-bulletin.index') }}">Bulletin</a> > <a href="{{ route('manage-bulletin.add') }}">Add Bulletin</a> > <b>Confirm Add Bulletin</b><br>
<h2 >
    Confirm Add bulletin
</h2>
<form action="{{ route('manage-bulletin.confirmAdd') }}" method="POST" >
    @csrf
    <div class="form-group">
        <label for="bulletincategory">Category</label>
        <input type="text" name="category" stakeholder="{{ $_GET['category'] }}" value="{{ $_GET['category'] }}" class="form-control" readonly>
    </div>
    <div class="form-group">
        <label for="bulletintitle">Title</label>
        <input type="text" name="title" stakeholder="{{ $_GET['title'] }}" value="{{ $_GET['title'] }}" class="form-control" readonly>
    </div>
    <div class="form-group">
        <label for="bulletinmessage">Message</label>
        <textarea name="message" rows="6" class="form-control" value="{{ $_GET['message'] }}" readonly>{{ $_GET['message'] }}</textarea>
    </div>
    <div class="form-group">
        <label for="bulletinreference">Url reference</label>
        <input type="text" name="reference" stakeholder="{{ $_GET['reference'] }}" value="{{ $_GET['reference'] }}" class="form-control" readonly>
    </div>
    <div >
        <label for="bulletinview">Bulletin view</label>
        <input type="hidden" name="days" value="{{ $_GET['days'] }}"/>
        <select name="days" id="days" disabled>
            <option value="{{ $_GET['days'] }}" >{{ $_GET['days'] }} Day</option>
            <option value="1" >1 Day</option>
            <option value="2">2 Day</option>
            <option value="3">3 Day</option>
            <option value="4">4 Day</option>
        </select>
    </div>
    <button type="submit" onclick="return confirm('Are you sure you want to add?')">Save</button>
    <a href="{{ route('manage-bulletin.index') }}">Cancel</a>
</form>