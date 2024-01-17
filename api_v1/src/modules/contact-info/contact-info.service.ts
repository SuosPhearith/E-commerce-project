import { Injectable } from '@nestjs/common';
import { CreateContactInfoDto } from './dto/create-contact-info.dto';
import { UpdateContactInfoDto } from './dto/update-contact-info.dto';

@Injectable()
export class ContactInfoService {
  create(createContactInfoDto: CreateContactInfoDto) {
    return 'This action adds a new contactInfo';
  }

  findAll() {
    return `This action returns all contactInfo`;
  }

  findOne(id: number) {
    return `This action returns a #${id} contactInfo`;
  }

  update(id: number, updateContactInfoDto: UpdateContactInfoDto) {
    return `This action updates a #${id} contactInfo`;
  }

  remove(id: number) {
    return `This action removes a #${id} contactInfo`;
  }
}
