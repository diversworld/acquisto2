# Hooks

## modifyProduct

Der modifyProduct Hook erlaubt es ein Produkt nach dem Laden zu manipulieren. Der Produktarray wird übergeben und erwartet wird seine Rückgabe.

$GLOBALS['TL_HOOKS']['modifyProduct'][] = array('', '');

class myClass {
    public function myFunction($productArray)
    {
        [...]
        return $productArray;
    }
}
