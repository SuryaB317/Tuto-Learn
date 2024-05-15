<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Chapter</title>
    <link rel="stylesheet" href="add_chapter.css">
</head>

<body>
    <div class="container">

        <h2 class="textual"><i class="fa fa-book"></i> New Chapters </h2>
        <small style="color:darkgreen; margin-left: 10%; font-weight: bold;">On adding new chapters, your course will appear more meaningful to learn</small>
        <form #addChapterform="ngForm" (ngSubmit)="addChapters()">

            <div class="form-group">
                <label for="coursename">Course Name: <b class="text-danger">*</b></label>
                <select class="form-control" id="sel1" name="coursename" [(ngModel)]="chapter.coursename" required #coursename="ngModel">
              <option style="color: lightgray;" selected="true" value="default">select course name</option>
              <option *ngFor="let course of coursenames | async">{{course}}</option>
            </select>
                <!--<input type="text" class="form-control" placeholder="enter course name" name="coursename" [(ngModel)]="chapter.coursename" required 
          #coursename="ngModel"
          [class.is-invalid]="coursename.invalid && coursename.touched">
         <small class="text-danger" [class.d-none]="coursename.valid || coursename.untouched"><b>required field</b></small>-->
            </div>
            <small style="color: gray; font-weight: bold;">Please choose course name from the drop-down</small>

            <div id="chapter1">
                <div class="form-group">
                    <label for="chapter1name">Chapter-1 Name: <b class="text-danger">*</b></label>
                    <input type="text" class="form-control" placeholder="enter chapter-1 name" id="chapter1nametxt" name="chapter1name" [(ngModel)]="chapter.chapter1name">
                </div>
                <div class="form-group">
                    <label for="chapter1id">Chapter-1 URL: <b class="text-danger">*</b></label>
                    <input type="text" class="form-control" placeholder="enter chapter-1 URL as ID" id="chapter1idtxt" name="chapter1id" [(ngModel)]="chapter.chapter1id">
                    <small style="color: gray; font-weight: bold;">Please Provide the Chapter-1 video ID as the URL here...</small>
                </div>
                <div id="chapter1btn" style="width: 12%; cursor: pointer; margin-top: 8px; background-color: rgb(13, 68, 65); color: white; font-weight: bold; border: none; font-size: small; outline: none; padding: 5px 15px 5px 15px; border-radius: 15px;"><i class="fa fa-plus"></i> Add</div>
            </div>

            <div id="chapter2">
                <div class="form-group">
                    <label for="chapter2name">Chapter-2 Name: <b class="text-danger">*</b></label>
                    <input type="text" class="form-control" placeholder="enter chapter-2 name" id="chapter2nametxt" name="chapter2name" [(ngModel)]="chapter.chapter2name">
                </div>
                <div class="form-group">
                    <label for="chapter2id">Chapter-2 URL: <b class="text-danger">*</b></label>
                    <input type="text" class="form-control" placeholder="enter chapter-2 URL as ID" id="chapter2idtxt" name="chapter2id" [(ngModel)]="chapter.chapter2id">
                    <small style="color: gray; font-weight: bold;">Please Provide the Chapter-2 video ID as the URL here...</small>
                </div>
                <div id="chapter2btn" style="width: 12%; margin-top: 8px; cursor: pointer; background-color: rgb(13, 68, 65); color: white; font-weight: bold; border: none; font-size: small; outline: none; padding: 5px 15px 5px 15px; border-radius: 15px;"><i class="fa fa-plus"></i> Add</div>
                <div id="remove2btn" style="width: 15%; margin-top: -4.5%; margin-left: 14%; cursor: pointer; background-color: rgb(201, 13, 13); color: white; font-weight: bold; border: none; font-size: small; outline: none; padding: 5px 15px 5px 15px; border-radius: 15px;"><i class="fa fa-trash"></i> Remove</div>
            </div>

            <div id="chapter3">
                <div class="form-group">
                    <label for="chapter3name">Chapter-3 Name: <b class="text-danger">*</b></label>
                    <input type="text" class="form-control" placeholder="enter chapter-3 name" id="chapter3nametxt" name="chapter3name" [(ngModel)]="chapter.chapter3name">
                </div>
                <div class="form-group">
                    <label for="chapter3id">Chapter-3 URL: <b class="text-danger">*</b></label>
                    <input type="text" class="form-control" placeholder="enter chapter-3 URL as ID" id="chapter3idtxt" name="chapter3id" [(ngModel)]="chapter.chapter3id">
                    <small style="color: gray; font-weight: bold;">Please Provide the Chapter-3 video ID as the URL here...</small>
                </div>
                <div id="chapter3btn" style="width: 12%; margin-top: 8px; cursor: pointer; background-color: rgb(13, 68, 65); color: white; font-weight: bold; border: none; font-size: small; outline: none; padding: 5px 15px 5px 15px; border-radius: 15px;"><i class="fa fa-plus"></i> Add</div>
                <div id="remove3btn" style="width: 15%; margin-top: -4.5%; margin-left: 14%; cursor: pointer; background-color: rgb(201, 13, 13); color: white; font-weight: bold; border: none; font-size: small; outline: none; padding: 5px 15px 5px 15px; border-radius: 15px;"><i class="fa fa-trash"></i> Remove</div>
            </div>

            <div id="chapter4">
                <div class="form-group">
                    <label for="chapter4name">Chapter-4 Name: <b class="text-danger">*</b></label>
                    <input type="text" class="form-control" placeholder="enter chapter-4 name" id="chapter4nametxt" name="chapter4name" [(ngModel)]="chapter.chapter4name">
                </div>
                <div class="form-group">
                    <label for="chapter4id">Chapter-4 URL: <b class="text-danger">*</b></label>
                    <input type="text" class="form-control" placeholder="enter chapter-4 URL as ID" id="chapter4idtxt" name="chapter4id" [(ngModel)]="chapter.chapter4id">
                    <small style="color: gray; font-weight: bold;">Please Provide the Chapter-4 video ID as the URL here...</small>
                </div>
                <div id="chapter4btn" style="width: 12%; margin-top: 8px; cursor: pointer; background-color: rgb(13, 68, 65); color: white; font-weight: bold; border: none; font-size: small; outline: none; padding: 5px 15px 5px 15px; border-radius: 15px;"><i class="fa fa-plus"></i> Add</div>
                <div id="remove4btn" style="width: 15%; margin-top: -4.5%; margin-left: 14%; cursor: pointer; background-color: rgb(201, 13, 13); color: white; font-weight: bold; border: none; font-size: small; outline: none; padding: 5px 15px 5px 15px; border-radius: 15px;"><i class="fa fa-trash"></i> Remove</div>
            </div>

            <div id="chapter5">
                <div class="form-group">
                    <label for="chapter5name">Chapter-5 Name: <b class="text-danger">*</b></label>
                    <input type="text" class="form-control" placeholder="enter chapter-5 name" id="chapter5nametxt" name="chapter5name" [(ngModel)]="chapter.chapter5name">
                </div>
                <div class="form-group">
                    <label for="chapter5id">Chapter-5 URL: <b class="text-danger">*</b></label>
                    <input type="text" class="form-control" placeholder="enter chapter-5 URL as ID" id="chapter5idtxt" name="chapter5id" [(ngModel)]="chapter.chapter5id">
                    <small style="color: gray; font-weight: bold;">Please Provide the Chapter-5 video ID as the URL here...</small>
                </div>
                <div id="chapter5btn" style="width: 12%; margin-top: 8px; cursor: pointer; background-color: rgb(13, 68, 65); color: white; font-weight: bold; border: none; font-size: small; outline: none; padding: 5px 15px 5px 15px; border-radius: 15px;"><i class="fa fa-plus"></i> Add</div>
                <div id="remove5btn" style="width: 15%; margin-top: -4.5%; margin-left: 14%; cursor: pointer; background-color: rgb(201, 13, 13); color: white; font-weight: bold; border: none; font-size: small; outline: none; padding: 5px 15px 5px 15px; border-radius: 15px;"><i class="fa fa-trash"></i> Remove</div>
            </div>

            <div id="chapter6">
                <div class="form-group">
                    <label for="chapter6name">Chapter-6 Name: <b class="text-danger">*</b></label>
                    <input type="text" class="form-control" placeholder="enter chapter-6 name" id="chapter6nametxt" name="chapter6name" [(ngModel)]="chapter.chapter6name">
                </div>
                <div class="form-group">
                    <label for="chapter6id">Chapter-6 URL: <b class="text-danger">*</b></label>
                    <input type="text" class="form-control" placeholder="enter chapter-6 URL as ID" id="chapter6idtxt" name="chapter6id" [(ngModel)]="chapter.chapter6id">
                    <small style="color: gray; font-weight: bold;">Please Provide the Chapter-6 video ID as the URL here...</small>
                </div>
                <div id="chapter6btn" style="width: 12%; margin-top: 8px; cursor: pointer; background-color: rgb(13, 68, 65); color: white; font-weight: bold; border: none; font-size: small; outline: none; padding: 5px 15px 5px 15px; border-radius: 15px;"><i class="fa fa-plus"></i> Add</div>
                <div id="remove6btn" style="width: 15%; margin-top: -4.5%; margin-left: 14%; cursor: pointer; background-color: rgb(201, 13, 13); color: white; font-weight: bold; border: none; font-size: small; outline: none; padding: 5px 15px 5px 15px; border-radius: 15px;"><i class="fa fa-trash"></i> Remove</div>
            </div>

            <div id="chapter7">
                <div class="form-group">
                    <label for="chapter7name">Chapter-7 Name: <b class="text-danger">*</b></label>
                    <input type="text" class="form-control" placeholder="enter chapter-7 name" id="chapter7nametxt" name="chapter7name" [(ngModel)]="chapter.chapter7name">
                </div>
                <div class="form-group">
                    <label for="chapter7id">Chapter-7 URL: <b class="text-danger">*</b></label>
                    <input type="text" class="form-control" placeholder="enter chapter-7 URL as ID" id="chapter7idtxt" name="chapter7id" [(ngModel)]="chapter.chapter7id">
                    <small style="color: gray; font-weight: bold;">Please Provide the Chapter-7 video ID as the URL here...</small>
                </div>
                <div id="chapter7btn" style="width: 12%; margin-top: 8px; cursor: pointer; background-color: rgb(13, 68, 65); color: white; font-weight: bold; border: none; font-size: small; outline: none; padding: 5px 15px 5px 15px; border-radius: 15px;"><i class="fa fa-plus"></i> Add</div>
                <div id="remove7btn" style="width: 15%; margin-top: -4.5%; margin-left: 14%; cursor: pointer; background-color: rgb(201, 13, 13); color: white; font-weight: bold; border: none; font-size: small; outline: none; padding: 5px 15px 5px 15px; border-radius: 15px;"><i class="fa fa-trash"></i> Remove</div>
            </div>

            <div id="chapter8">
                <div class="form-group">
                    <label for="chapter8name">Chapter-8 Name: <b class="text-danger">*</b></label>
                    <input type="text" class="form-control" placeholder="enter chapter-8 name" id="chapter8nametxt" name="chapter8name" [(ngModel)]="chapter.chapter8name">
                </div>
                <div class="form-group">
                    <label for="chapter8id">Chapter-8 URL: <b class="text-danger">*</b></label>
                    <input type="text" class="form-control" placeholder="enter chapter-8 URL as ID" id="chapter8idtxt" name="chapter8id" [(ngModel)]="chapter.chapter8id">
                    <small style="color: gray; font-weight: bold;">Please Provide the Chapter-8 video ID as the URL here...</small>
                </div>
                <div id="chapter8btn" style="width: 12%; margin-top: 8px; cursor: pointer; background-color: rgb(13, 68, 65); color: white; font-weight: bold; border: none; font-size: small; outline: none; padding: 5px 15px 5px 15px; border-radius: 15px;"><i class="fa fa-plus"></i> Add</div>
                <div id="remove8btn" style="width: 15%; margin-top: -4.5%; margin-left: 14%; cursor: pointer; background-color: rgb(201, 13, 13); color: white; font-weight: bold; border: none; font-size: small; outline: none; padding: 5px 15px 5px 15px; border-radius: 15px;"><i class="fa fa-trash"></i> Remove</div>
            </div>

            <div class="checkbox" style="margin-top: 5px;">
                <small style="font-weight: 700; color: darkred;"><input type="checkbox" name="remember" required> whether these chapters has the valid contents related to the course </small>
            </div>
            <button style="margin-top: 15px;" [disabled]="addChapterform.form.invalid" type="submit" class="btn registerbtn"><i class="fa fa-plus"></i>&nbsp; Add Chapter</button>
        </form>
    </div>

    <br><br><br><br>

</body>

</html>