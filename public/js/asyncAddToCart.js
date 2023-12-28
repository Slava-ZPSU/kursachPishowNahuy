function addToCard(id) {
    fetch(`/cart/addProductToCart/${id}`, {
        method: "GET"
    }).then(response => {
        if (!response.ok) {
            throw new Error('Network response was not ok');
        }
        return response.json();
    }).then(data => {
        if (data.status === true) {
            alert(data.message);
        } else {
            alert(data.message);
        }
    }).catch(error => {
        alert('Помилка при додаванні');
    });

    return false;
}