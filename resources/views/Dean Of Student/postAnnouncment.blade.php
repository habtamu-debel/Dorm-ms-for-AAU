<!DOCTYPE html>
<html>
<head>
    <title>Create Announcement</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
    <style>
        body {
    font-family: Arial, sans-serif;
    margin: 20px;
    justify-content: center;
  align-items: center;
}

h1 {
    text-align: center;
}

.form-group {
    margin-bottom: 10px;
    align-items: center;
   
}

label {
    display: block;

}

input[type="text"]
 {
    width: 200%;
    height:20px;
    padding: 5px;
    margin-top: 5px;
}

textarea
{
    width: 200%;
    padding: 5px;
    margin-top: 5px;
    height:200px;
} 


input[type="submit"] {
    background-color: #4CAF50;
    color: white;
    cursor: pointer;
    width: 205%;
    padding:5px;
}

input[type="submit"]:hover {
    background-color: #45a049;
}

.hidden {
    display: none;
}

#successMessage {
    background-color: #4CAF50;
    color: white;
    padding: 10px;
    text-align: center;
}

.announcementForm

{
    display: flex;
    justify-content: center;
  align-items: center;
  margin-left:300px;
  width:1235px;
  padding-top:20px;
  padding-bottom:20px;
  max-width:700px;

  box-shadow: 0 0 5px rgba(73, 98, 209, 0.5);



}
.myform
{
    margin-right:250px;
   
}
.error-message {
  color: red;
  font-size: 14px;
  margin-top: 5px;
}
        </style>
    <h1>Create Announcement</h1>
<div class="announcementForm">
<form action="{{ route('deanAnnouncement.store') }}" method="POST" class="myform" enctype="multipart/form-data">
    @csrf
   

    <div class="form-group">
                <label for="title">Title:</label>

                <input type="text" id="title" name="title" value="{{ old('title') }}"  required>
                @error('title')
                <div class="error-message">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="content">Content:</label> 
                <textarea id="content" name="content"  value="{{ old('content') }}" required></textarea>
                @error('content')
                <div class="error-message">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="type">For:</label>
                <input type="text" id="type" name="type" value="{{ old('type') }}" required>
                @error('type')
                <div class="error-message">{{ $message }}</div>
                @enderror
            
            </div>

            <div class="form-group">
        <label for="attachment">Attachment</label>
        <input type="file" name="attachment" id="attachment" value="{{ old('attachment') }}">
    </div>

            <input type="submit" value="Post">
        </form>

   

    <div id="successMessage" class="hidden">Announcement posted successfully!</div>
</div>

<script>
      const titleInput = document.getElementById('title');
        titleInput.addEventListener('input', function () {
            const value = this.value;
            const containsOnlyNumbers = /^\d+$/.test(value);
            if (containsOnlyNumbers) {
                this.setCustomValidity('Title cannot be a number.');
            } else {
                this.setCustomValidity('');
            }
        });

        const contentInput = document.getElementById('content');
    contentInput.addEventListener('input', function () {
        const value = this.value;
        const containsOnlyNumbers = /^\d+$/.test(value);
        if (containsOnlyNumbers) {
            this.setCustomValidity('Content cannot be a number.');
        } else {
            this.setCustomValidity('');
        }
    });

    const typeInput = document.getElementById('type');
    typeInput.addEventListener('input', function () {
        const value = this.value;
        const containsOnlyNumbers = /^\d+$/.test(value);
        if (containsOnlyNumbers) {
            this.setCustomValidity('Type cannot be a number.');
        } else {
            this.setCustomValidity('');
        }
    });
    </script>
</body>
</html>