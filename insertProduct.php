<html>
  <head>
    <style>
      body {font-family: Arial, Helvetica, sans-serif;}
    
      form.a {padding-top: 16px; padding-right: 16px; padding-left: 16px; margin: 0}
      form.b {padding-right: 16px; padding-left: 16px; margin: 0}
      .topnav {
        background-color: #333;
        overflow: hidden;
      }
      .center {
        display: block;
        margin-left: auto;
        margin-right: auto;
      }
      input[type=text], [type=file], input[type=password] {
        width: 100%;
        padding: 12px 20px;
        margin: 8px 0;
        display: inline-block;
        border: 1px solid #ccc;
        box-sizing: border-box;
      }

      button.a {
        background-color: #4CAF50;
        color: white;
        padding: 14px 20px;
        margin: 8px 0;
        border: none;
        cursor: pointer;
        width: 100%;
      }
      button.b {
        background-color: blue;
        color: white;
        padding: 14px 20px;
        margin: 8px 0;
        border: none;
        cursor: pointer;
        width: 100%;
      }

      button:hover {
        opacity: 0.8;
      }

      .cancelbtn {
        width: auto;
        padding: 10px 18px;
        background-color: #f44336;
      }


      .container {
        padding: 16px;
        border: 3px solid #f1f1f1; width: 40%; margin: auto;
      }

      span.psw {
        float: right;
        padding-top: 16px;
      }
    </style>

  </head>
  <body>
   

    <div class="container">
      <form class="a" action="" method = "post" id="insert Product">
         <input type="hidden" name="act" value="Insert Product here">

         <label for="productName"><b>Product Name</b></label>
         <input type="text" placeholder="Enter productName "  name="productName" required>
        
         <label for="des"><b>Descirption</b></label>
         <input type="text" placeholder="Enter the product Description"  name="desc" required>


         <label for="price"><b>Price</b></label>
         <input type="text" placeholder="Enter price"  name="price" required>
                
        <!-- <span className="input-group-text recipe-ul" id="inputGroupFileAddon01" >Upload Image</span> -->
       
       
        <label for="percent"><b>percentage Discount</b></label>
        <input type="text" placeholder="Enter the discount that you want to give" name="percent" required>
      
        <label for="discount"><b>number of Product Discount</b></label>
        <input type="text" placeholder="Enter Product Discount" name="discount" required>
        
        <input type="file" onChange="handleFileChange()">
        
        <button for = "image"  onClick= "handleUpload()">Upload Image</button>
          </br></br>
         <button class="a" type="submit" value="Product Submit">Submit</button>

       </form>
      
      </div>

    <script>
        function handleUpload(){
      
            console.log("handleUpload State:", this.state);
            const uploadTask = storage.ref(`images/${this.state.image.name}`).put(this.state.image);
            console.log("handleUpload State: ==========================================");
            uploadTask.on(
            "state_changed",
            snapshot => {

                const progress = Math.round(
                (snapshot.bytesTransferred / snapshot.totalBytes) * 100
                );

                this.setState({
                progress: progress
                });
                
                console.log("Inside Handle Upload\n state :", this.state);

            },
            error => {
                console.log("Error ==>", error);
            },
            () => {
                this.state.images.push(this.state.image.name);
            
                console.log("Before getting image from storage\n state: ", this.state);
                storage
                .ref("images")
                .child(this.state.image.name)
                .getDownloadURL()
                .then(imageUrl => {
                    this.setState({
                    url: imageUrl,
                    imageString: imageUrl
                    });
                    this.state.urls.push(imageUrl);
                });
            }
            );
            console.log("After Handle Upload\n state :", this.state);
            };
        }
    </script>

  </body>

  
</html>
