import { ProductSizeColor } from 'src/modules/product/entities/product-size-color.entity';
import { Column, Entity, ManyToOne, PrimaryGeneratedColumn } from 'typeorm';

@Entity()
export class Color {
  @PrimaryGeneratedColumn('uuid')
  id: string;

  @Column()
  name: string;

  @Column()
  description: Text;

  @ManyToOne(
    () => ProductSizeColor,
    (productSizeColor) => productSizeColor.colors,
  )
  productSizeColor: ProductSizeColor;
}
