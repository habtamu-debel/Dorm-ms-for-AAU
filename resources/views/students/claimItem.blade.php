<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Add Additional Information</title>
  <link rel="stylesheet" href="additionalInfo.css">
</head>

<style>
    body {
  font-family: Arial, sans-serif;
  background-color: #f5f5f5;
  margin: 0;
  padding: 0;
}

.container {
  max-width: 800px;
  margin: 0 auto;
  padding: 2rem;
  background-color: #fff;
  box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15);
  border-radius: 0.5rem;
}

h1 {
  text-align: center;
  margin-bottom: 2rem;
}

.form-group {
  margin-bottom: 1.5rem;
}

label {
  display: block;
  font-weight: bold;
  margin-bottom: 0.5rem;
}

textarea {
  width: 100%;
  padding: 0.75rem;
  font-size: 1rem;
  border: 1px solid #ced4da;
  border-radius: 0.25rem;
  resize: vertical;
}

.btn-submit {
  display: block;
  width: 100%;
  padding: 0.75rem 1.5rem;
  font-size: 1rem;
  font-weight: bold;
  color: #fff;
  background-color: #007bff;
  border: none;
  border-radius: 0.25rem;
  cursor: pointer;
  transition: background-color 0.3s ease-in-out;
}

.btn-submit:hover {
  background-color: #0056b3;
}
    </style>
    
<body>
  <div class="container">
    <h1>Add Additional Information</h1>
    <form action="{{ route('claimItem.store', ['id' => $post->id]) }}" method="POST" enctype="multipart/form-data">
      @csrf
      @method('PUT')
      <div class="form-group">
        <label for="additional-info">Additional Information:</label>
        <textarea id="additional-info" name="additional_info" rows="5" placeholder="Enter additional information about the item..."></textarea>
      </div>
      <button type="submit" class="btn-submit">Submit</button>
    </form>
  </div>
</body>
</html>