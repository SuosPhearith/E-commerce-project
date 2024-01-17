import { Column, Entity, OneToMany, PrimaryGeneratedColumn } from 'typeorm';
import { Product } from './product.entity';
import { Size } from 'src/modules/size/entities/size.entity';
import { Color } from 'src/modules/color/entities/color.entity';

@Entity()
export class ProductSizeColor {
  @PrimaryGeneratedColumn('uuid')
  id: string;

  @OneToMany(() => Product, (product) => product.productSizeColor)
  products: Product[];

  @OneToMany(() => Size, (size) => size.productSizeColor)
  sizes: Size[];

  @OneToMany(() => Color, (color) => color.productSizeColor)
  colors: Color[];

  @Column()
  quantity: number;
}
