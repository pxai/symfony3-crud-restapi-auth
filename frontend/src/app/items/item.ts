/**
* Define this interface to have type checking
* btw, this will not generate extra JS
* because there are no interfaces in JS
*/
export class Item {

  constructor (private id: number,
               private name: string,
               private description: string,
               private status: number) { }

}
