<div id="recipeStatus"></div>
<form id="recipeForm">
    <div class="form-group">
        <label>Title</label>
        <input type="text" class="form-control" id="r_inputTitle" value="">
    </div>
    CONTENT_EDITOR
    <div class="form-group">
        <label>Ingredients</label>
        <input type="text" class="form-control" id="r_inputIngredients" value="">
    </div>
    <div class="form-group">
        <label>Cooking Time</label>
        <input type="text" class="form-control" id="r_inputTime" value="">
    </div>
    <div class="form-group">
        <label>Cooking Utensils</label>
        <input type="text" class="form-control" id="r_inputUtensils" value="">
    </div>
    <div class="form-group">
        <label>Cooking Level</label>
        <select class="form-control" id="r_inputLevel">
            <option value="Beginner">Beginner</option>
            <option value="Intermediate">Intermediate</option>
            <option value="Expert">Expert</option>
        </select>
    </div>
    <div class="form-group">
        <label>Meal Type</label>
        <input type="text" class="form-control" id="r_inputMealType" value="">
    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-primary">Submit Recipe</button>
    </div>
</form>