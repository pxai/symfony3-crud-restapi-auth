/**
* Define this interface to have type checking
* btw, this will not generate extra JS
* because there are no interfaces in JS
*/
export class Item {

  id: number;
  name: string;
  description: string;
  status: string;

  constructor ( id: number,
                name: string,
                description: string,
                status: string) { 
                  this.id = id;
                  this.name = name;
                  this.description = description;
                  this.status = status;
                }


}
